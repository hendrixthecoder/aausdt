<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transfer</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="text-white bg-black">
    <div class="flex gap-x-44 p-3 border-b border-gray-400">
        <a href="{{ route('userHome') }}">
            <span class="material-icons">arrow_back_ios</span>
        </a>
        <p>Transfer</p>
    </div>
    <div class="p-4 my-4">
        <div class="bg-my-ash w-full p-4 rounded-md">
            <div class="w-full mb-3 flex gap-4">
                <img src="{{ asset('images/moneybag.png') }}" class="h-14" alt="">
                <div class="flex flex-col gap-2">
                    <p class="text-orange-400">{{ $balance }} ≈ ${{ $balance }}</p>
                    <p>Balance</p>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <ul class="my-4 rounded-md flex flex-col gap-2 bg-red-700">
                @foreach ($errors->all() as $error)
                    <li class="p-3 rounded-md text-center">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        @if (Session::has('error'))
            <div class="my-3 p-3 bg-red-700 rounded-md">{{ Session::get('error') }}</div>
        @endif

        @if (Session::has('success'))
            <div class="my-3 p-3 bg-green-700 rounded-md">{{ Session::get('success') }}</div>
        @endif

        <div class="my-4">
            <form action="{{ route('userCreateTransfer') }}" method="post" class="flex flex-col gap-3 w-full">
                @csrf
                <div class="flex flex-col gap-1">
                    <label for="amount">Account</label>
                    <div class="relative">
                        <span class="material-icons text-sm absolute pointer-events-none top-3 left-2 ">person</span>
                        <input required name="account" type="text" value="{{ old('account') }}" class="bg-my-ash w-full rounded-md p-2 pl-7 outline-none" placeholder="Please put in username here">
                    </div>
                    <p class="text-orange-400 text-xs">Tip: the opposite account must be a first level vip to be transferred.</p>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="amount">Amount</label>
                    <div class="relative">
                        <span class="material-icons text-sm absolute pointer-events-none top-3 left-2 ">payments</span>
                        <input required name="amount" type="text" value="{{ old('amount') }}" class="bg-my-ash w-full rounded-md p-2 pl-7 outline-none" placeholder="Please put in amount here">
                    </div>
                    <p class="text-orange-400 text-xs">Tip: the opposite account must be a first level vip to be transferred.</p>
                </div>
                <input type="submit" value="One Click Transfer Without Trade Key" class="bg-deep-blue p-2 rounded-md cursor-pointer">
            </form>
        </div>
    </div>
</body>
</html>