<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Withdrawals</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <style>
        dialog::backdrop {
            background-color: rgba(0,0,0,0.5)
        }
    </style>
</head>
<body class="bg-black text-white ">
    <div class="flex justify-between p-3 border-b border-gray-400">
        <a href="{{ route('userHome') }}">
            <span class="material-icons">arrow_back_ios</span>
        </a>
        <p class="">Pending Deposits</p>
    </div>
    <div class="p-4">
        @if ($deposits->isEmpty())
            <div class="bg-my-ash p-4 rounded-md my-3">There are currently no pending deposits in the system!</div>
        @else

        @if (Session::has('success'))
            <div class="bg-green-700 rounded-md my-4 p-4">{{ Session::get('success') }}</div>
        @endif

        <div class="overflow-x">
            <table class="border-gray-700 w-full border my-4 bg-my-ash">
                <tr class="border border-gray-700">
                    <th class="p-2 border-r border-gray-700">Amount</th>
                    <th class="p-2 border border-gray-700">Status</th>
                    <th class="p-2 border border-gray-700">Date</th>
                    <th class="p-2">Actions</th>
                </tr>
                <tbody class="text-center">
                    @foreach ($deposits as $deposit)
                        <tr>
                            <td class="p-2">{{ $deposit->amount }}</td>
                            <td class="p-2">{{ $deposit->status }}</td>
                            <td class="p-2">{{ $deposit->created_at }}</td>
                            <td class="p-2">
                                <button data-modal-id="{{ $deposit->id }}" onclick="openEachModal()" class="bg-blue-700 p-1 px-2 rounded-md text-sm flex gap-1" >
                                    Actions
                                    <span class="material-icons" style="font-size: 20px">visibility</span>
                                </button>
                            </td>
                            <dialog class="rounded-md text-white w-9/12 bg-my-ash p-4" id="modal{{ $deposit->id }}">
                                <div class="flex justify-end">
                                    <span class="material-icons cursor-pointer" onclick="closeEachModal()">close</span>
                                </div>
                                <div class="w-full h-auto my-5">
                                    <img src="/storage/{{ $deposit->path }}" alt="">
                                </div>
                                <div class="flex gap-4">
                                    <form action="{{ route('adminApproveDeposit', ['id' => $deposit->id]) }}" method="post">
                                        @csrf
                                        <input type="submit" class="bg-green-700 p-2 rounded-md cursor-pointer" value="Approve">
                                    </form>
                                    <form action="{{ route('adminDeclineDeposit', ['id' => $deposit->id ]) }}" method="post">
                                        @csrf
                                        <input type="submit" class="bg-red-700 p-2 rounded-md cursor-pointer" value="Decline">
                                    </form>
                                </div>
                            </dialog>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    <script>
        const openEachModal = () => {
            let id = event.target.getAttribute('data-modal-id');
            let modal = document.getElementById(`modal${id}`);
            modal.showModal();
        }

        const closeEachModal = () => {
            //closing each modal
            return event.target.parentNode.parentNode.close();
        }
    </script>
</body>
</html>