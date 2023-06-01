<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Payment Details</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white">

    <dialog class="w-9/12 bg-my-ash rounded-md p-4" id="createModal">
        <div class="w-full flex justify-end">
            <span class="material-icons cursor-pointer text-white" onclick="closeModal()">close</span>
        </div>
        <form action="{{ route('adminCreatePaymentDetail') }}" class="my-4 flex flex-col gap-4" method="post">
            @csrf
            <select required name="wallet_address_type" id="" class="rounded-md bg-my-ash text-white ">
                <option value="">Select wallet type</option>
                <option value="ERC20">ERC20</option>
                <option value="TRC20">TRC20</option>
            </select>
            <input required name="wallet_address" type="text" class="w-full rounded-md bg-my-ash text-white" placeholder="Wallet Address">
            <input type="submit" value="Submit" class="p-2 bg-blue-700 text-white rounded-md">
        </form>
    </dialog>

    <div class="w-full p-4 flex justify-between">
        <a href="{{ route('userHome') }}" class="flex">
            <span class="material-icons">arrow_back_ios</span>
            Home
        </a>
        <p class="">Payment Details</p>
        {{-- <button class="bg-blue-700 rounded-md px-2 " onclick="showModal()">
            <span class="material-icons text-sm">add_circle</span>
            Add
        </button> --}}
    </div>
    <div class="w-full p-4">
        
        @if ($errors->any())
        <ul class="my-3 w-full rounded-md">
            @foreach ($errors->all() as $error)
                <li class="bg-red-700 p-2 text-white my-2 rounded-md">{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        @if ($payment_details->isEmpty())
            <div class="w-full bg-my-ash p-3 text-white rounded-md">
                Seems like there aren't any payment details in the system, create one to enable users make payment.
            </div>
        @else
            <div class="flex flex-col w-full gap-4">
                @foreach ($payment_details as $detail)
                    <div class="bg-my-ash p-3 rounded-md flex flex-col gap-3">
                        <p>{{ $detail->wallet_address_type }}</p>
                        <p>{{ $detail->wallet_address }}</p>
                        <div class="flex justify-between">
                            <button class="w-16 flex gap-1 text-xs" id="{{ $detail->id }}" data-modal="" onclick="openModal()">
                                <span class="material-icons text-xs">border_color</span>
                                Edit
                            </button>
                        </div>
                    </div>
                        {{-- edit detail modal start --}}
                        <dialog id="modal{{ $detail->id }}" class="w-10/12 rounded-md shadow bg-my-ash">
                            <span class="material-icons cursor-pointer text-white" onclick="closeEachModal()">close</span>
                            <form action="{{ route('adminPutPaymentDetail', ['id' => $detail->id]) }}" class="flex flex-col gap-4 my-3" method="post">
                                @csrf
                                @method('PUT')
                                <div class="flex justify-between gap-4 ">
                                    <label for="wallet_type_edit{{ $detail->id }}" class="text-white mt-2">Wallet type:</label>
                    
                                    <select required name="wallet_address_type" id="wallet_type_edit{{ $detail->id }}" class="bg-my-ash text-white flex-grow outline-none border p-2 rounded-md">
                                        <option value="ERC20">ERC20</option>
                                        <option value="TRC20">TRC20</option>
                                    </select>
                                </div>
                                <input type="hidden" name="id" value="{{ $detail->id }}">
                                <input type="text" value="{{ $detail->wallet_address }}" required name="wallet_address" class="bg-my-ash text-white p-2 border rounded-md outline-none" placeholder="Wallet Address">
                                <input type="submit" value="Save" class="bg-deep-blue rounded-md text-white p-2 cursor-pointer">
                            </form>
                        </dialog>
                        {{-- edit detail modal end --}}
                @endforeach
            </div>
        @endif
    </div>
    <script>
        const showModal = () => {
            let modal = document.getElementById('createModal');
            return modal.showModal()
        }

        const closeModal = () => {
            let modal = document.getElementById('createModal');
            return modal.close()
        }

        const openModal = () => {
            let modalId = event.target.getAttribute('id');
            let modal = document.getElementById(`modal${modalId}`)
            modal.showModal()
        };

        const closeEachModal = () => {
            let modalId = event.target.parentElement.id
            let modal = document.getElementById(modalId)
            modal.close()
        }

    </script>
</body>
</html>