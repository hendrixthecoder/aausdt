<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wallets</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        dialog::backdrop {
            background-color: rgba(0,0,0,0.5);
        }
    </style>
</head>
<body class="bg-black text-white">
    {{-- create new walet modal starts here --}}
    <dialog class="w-10/12 rounded-md shadow bg-my-ash" id="modal">
        <button id="closeModal" class=" text-white rounded-md">
            <span class="material-icons">close</span>
        </button>

        <form action="{{ route('postWalletAdd') }}" class="flex flex-col gap-4 my-3" id="createWallet" method="post">
            @csrf
            <div class="flex justify-between gap-4 ">
                <label for="wallet_type" class="text-white mt-2">Wallet type:</label>

                <select required name="wallet_address_type" id="wallet_type" class="bg-my-ash text-white flex-grow outline-none border p-2 rounded-md">
                    <option value="ERC20">ERC20</option>
                    <option value="TRC20">TRC20</option>
                </select>
            </div>
            <input type="text" required name="wallet_address" class="bg-my-ash text-white p-2 border rounded-md outline-none" placeholder="Wallet Address">
            <input type="password" required name="trade_key" class="bg-my-ash text-white p-2 border rounded-md outline-none" placeholder="Trade Key">
            <input type="submit" value="Save" class="bg-deep-blue rounded-md text-white p-2 cursor-pointer">
        </form>
    </dialog>
    {{-- create new walet modal ends here --}}


    <div class="w-full p-2 border-b border-gray-400 flex justify-between ">
        <a href="{{ route('userHome') }}"><span class="material-icons">arrow_back_ios</span></a>
        <p class="">Wallet</p>
        <a href="" id="openModal" class="bg-deep-blue justify-self-end p-1 flex rounded-md text-sm"><span class="material-icons text-sm ">add_circle</span>Add Wallet</a>
    </div>
    <div class="w-full p-4">
        @if ($errors->any())
            <ul class="my-3 w-full rounded-md">
                @foreach ($errors->all() as $error)
                    <li class="bg-red-700 p-2 text-white my-2 rounded-md">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @if (Session::has('success'))
            <div class="bg-green-700 p-2 rounded-md w-full my-3">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('error'))
            <div class="bg-red-700 p-2 rounded-md w-full my-3">{{ Session::get('error') }}</div>
        @endif
        @if ($wallets->isEmpty())
            <div class="bg-my-ash w-full p-4 rounded-md">
                Seems like you have not added any wallets yet, click the icon at the top right to add a new wallet.
            </div>
        @else
        <div class="flex flex-col gap-4">
            @foreach ($wallets as $wallet)
                <div class="bg-my-ash w-full p-4 rounded-md flex flex-col gap-4" id="">
                    <p>{{ $wallet->wallet_address_type }}</p>
                    <p>{{ $wallet->wallet_address }}</p>
                    <div class="flex justify-between">
                        <button class="w-16 flex gap-1 text-xs" id="{{ $wallet->id }}" data-modal="" onclick="openModal()">
                            <span class="material-icons text-xs">border_color</span>
                            Edit
                        </button>
                        <form action="{{ route('deleteWallet', ['id' => $wallet->id]) }}" id="delete{{ $wallet->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{ $wallet->id }}" name="id">
                            <button class="w-16 flex text-xs" type="submit">
                                <span class="material-icons text-xs">delete</span>
                                Delete
                            </button>
                        </form>

                    </div>
                </div>
                {{-- edit wallet modal start --}}
                <dialog id="modal{{ $wallet->id }}" class="w-10/12 rounded-md shadow bg-my-ash">
                    <span class="material-icons cursor-pointer text-white" onclick="closeModal()">close</span>
                    <form action="{{ route('putWalletAdd') }}" class="flex flex-col gap-4 my-3" method="post">
                        @csrf
                        @method('PUT')
                        <div class="flex justify-between gap-4 ">
                            <label for="wallet_type_edit{{ $wallet->id }}" class="text-white mt-2">Wallet type:</label>
            
                            <select required name="wallet_address_type" id="wallet_type_edit{{ $wallet->id }}" class="bg-my-ash text-white flex-grow outline-none border p-2 rounded-md">
                                <option value="ERC20">ERC20</option>
                                <option value="TRC20">TRC20</option>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="{{ $wallet->id }}">
                        <input type="text" value="{{ $wallet->wallet_address }}" required name="wallet_address" class="bg-my-ash text-white p-2 border rounded-md outline-none" placeholder="Wallet Address">
                        <input type="password" required name="trade_key" class="bg-my-ash text-white p-2 border rounded-md outline-none" placeholder="Trade Key">
                        <input type="submit" value="Save" class="bg-deep-blue rounded-md text-white p-2 cursor-pointer">
                    </form>
                </dialog>
                {{-- edit wallet modal end --}}
            @endforeach
        </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            let openBtn = document.getElementById('openModal');
            let modal = document.getElementById('modal');
            let closeBtn = document.getElementById('closeModal');
            
            openBtn.addEventListener('click', function (e) {
                e.preventDefault()
                modal.showModal();
            })
            
            closeBtn.addEventListener('click', function (e) {
                e.preventDefault()
                modal.close();
            })
        })

        const openModal = () => {
            let modalId = event.target.getAttribute('id');
            let modal = document.getElementById(`modal${modalId}`)
            modal.showModal()
        };

        const closeModal = () => {
            let modalId = event.target.parentElement.id
            let modal = document.getElementById(modalId)
            modal.close()
        }

        const deleteWallet = () => {
            event.preventDefault()
            let formId = event.target.parentElement.id
            console.log(formId);
        }


        
    </script>
</body>
</html>
