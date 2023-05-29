<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deposits</title>
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
    <div class="flex gap-x-44 p-3 border-b border-gray-400">
        <a href="{{ route('userHome') }}">
            <span class="material-icons">arrow_back_ios</span>
        </a>
        <p>Deposits</p>
    </div>
    <div class="w-full p-4">
        <p class="font-semibold">Deposit account:</p>
        <p class="font-semibold my-2">Deposit filling:</p>
        <p class="text-xs text-red-800 my-2">Please upload the transfer screesnshot with transaction number.</p>
        @if ($errors->any())
            <ul class="flex flex-col gap-3">
                @foreach ($errors->all() as $error)
                    <li class="bg-red-700 p-2">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @if (Session::has('success'))
            <div class="bg-green-700 p-2 rounded-md">{{ Session::get('success') }}</div>
        @endif

        <form action="" class="flex flex-col gap-3 my-3" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex gap-2">
                <label for="voucher" class="mt-2">Voucher:</label>
                <input type="file" name="proof" id="" class="bg-my-ash rounded-md p-2 w-full">
            </div>
            <div class="flex gap-2">
                <label for="amount" class="mt-3">Amount:</label>
                <div class="flex-grow">
                    <span class="material-icons text-base absolute pointer-events-none mt-3 ml-2">payments</span>
                    <input type="text" name="amount" placeholder="Please input the deposit amount" class="p-3 w-full rounded-md flex-grow pl-8 outline-none bg-my-ash ">
                </div>
            </div>
            <div class="flex gap-2">
                <label for="amount" class="mt-3">Trade Key:</label>
                <div class="flex-grow">
                    <span class="material-icons text-base absolute pointer-events-none mt-3 ml-2">lock</span>
                    <input type="text" name="trade_key" placeholder="Please input your trade key" class="p-3 w-full rounded-md flex-grow pl-8 outline-none bg-my-ash ">
                </div>
            </div>
            <input type="submit" value="Confirm" class="w-full bg-deep-blue p-2 rounded-md cursor-pointer">
        </form>

        <p class="font-semibold my-2">Deposit example: </p>
        <img src="{{ asset('images/dephelp1.png') }}" class="my-4" alt="">
        <img src="{{ asset('images/dephelp2.png') }}" class="my-4" alt="">
        <img src="{{ asset('images/dephelp3.png') }}" class="my-4" alt="">

        <p class="font-semibold">Deposit records:</p>
        @if ($deposits->isEmpty())
            <div class="bg-my-ash p-4 rounded-md my-3">Seems like you have not made any deposits!</div>
        @else
        <table class="border-gray-700 border w-full my-4 bg-my-ash">
            <tr class="border border-gray-700">
                <th class="p-2 border-r border-gray-700">Amount</th>
                <th class="p-2 border border-gray-700">Status</th>
                <th class="p-2">Date</th>
            </tr>
            <tbody class="text-center">
                @foreach ($deposits as $deposit)
                    <tr>
                        <td class="p-2">{{ $deposit->amount }}</td>
                        <td class="p-2">{{ $deposit->status }}</td>
                        <td class="p-2">{{ $deposit->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

</body>
</html>