<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Withdraw</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="text-white bg-black">
    <div class="flex gap-x-44 p-3 border-b border-gray-400">
        <a href="{{ route('userHome') }}">
            <span class="material-icons">arrow_back_ios</span>
        </a>
        <p>Withdrawals</p>
    </div>
    <div class="p-4 my-4">
        <div class="bg-my-ash w-full p-4 rounded-md">
            <div class="w-full mb-3 flex gap-4">
                <img src="{{ asset('images/moneybag.png') }}" class="h-14" alt="">
                <div class="flex flex-col gap-2">
                    <p class="text-orange-400">{{ $balance }}USDT ≈ ${{ $balance }}</p>
                    <p>Balance(USDT)</p>
                </div>
            </div>
        </div>

        @if ($wallets->isEmpty())
            <div class="bg-red-700 p-3 my-3 rounded-md">Seems like you have not added a wallet yet, click <a href="{{ route('userWalletsPage') }}" class="underline">here</a> to add one to be able to make a withdrawal.</div>
        @endif

        @if ($errors->any())
            <ul class="my-4">
                @foreach ($errors->all() as $error)
                    <li class="bg-red-700 p-2 rounded-md">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        @if (Session::has('success'))
            <div class="bg-green-700 p-3 my-3 rounded-md">{{ Session::get('success') }}</div>
        @endif

        @if (Session::has('error'))
            <div class="bg-red-700 p-3 my-3 rounded-md">{{ Session::get('error') }}</div>
        @endif

        <div class="my-4">
            <form action="{{ route('createWithdrawalUser') }}" method="post" class="flex flex-col gap-3 w-full">
                @csrf
                <div class="flex flex-col gap-1">
                    <label for="wallet">Wallet</label>
                    <select required name="wallet" id="wallet" class="bg-my-ash p-2 rounded-md outline-none">
                        @foreach ($wallets as $wallet)
                            <option value="{{ $wallet->wallet_address_type }} {{ $wallet->wallet_address }}">{{ $wallet->wallet_address_type }} {{ $wallet->wallet_address }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="amount">Amount</label>
                    <div class="relative">
                        <span class="material-icons text-sm absolute pointer-events-none top-3 left-2 ">payments</span>
                        <input required name="amount" type="text" value="{{ old('amount') }}" class="bg-my-ash w-full rounded-md p-2 pl-7 outline-none" placeholder="Please put in amount here">
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="amount">Trade Key</label>
                    <div class="relative">
                        <span class="material-icons text-sm absolute pointer-events-none top-3 left-2 ">lock</span>
                        <input required name="trade_key" type="password" class="bg-my-ash w-full rounded-md p-2 pl-7 outline-none" placeholder="Please put in trade key here">
                    </div>
                </div>
                <input type="submit" value="Submit" class="bg-deep-blue p-2 rounded-md cursor-pointer">
            </form>
        </div>
        <div class="my-4 text-center">
            <h3 class="font-semibold text-lg">Withdrawal Records</h3>
        @if ($withdrawals->isEmpty())
            <div class="bg-my-ash p-4 rounded-md my-3">Seems like you have not made any withdrawals!</div>
        @else
        <table class="border-gray-700 border w-full my-4 bg-my-ash">
            <tr class="border border-gray-700">
                <th class="p-2 border-r border-gray-700">Amount</th>
                <th class="p-2 border border-gray-700">Status</th>
                <th class="p-2">Date</th>
            </tr>
            <tbody class="text-center">
                @foreach ($withdrawals as $withdrawal)
                    <tr>
                        <td class="p-2">{{ $withdrawal->amount }}</td>
                        <td class="p-2">{{ $withdrawal->status }}</td>
                        <td class="p-2">{{ $withdrawal->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        </div>
    </div>
</body>
</html>