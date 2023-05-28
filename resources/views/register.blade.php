<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-black text-white">
    <div class=" text-center w-full p-4 px-10">
        <p>Register</p>
        @if ($errors->any())
            <ul class="my-5">
                @foreach ($errors->all() as $error)
                    <li class="bg-red-700 p-3 my-2 rounded-md">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('postRegisterUser') }}" method="post" class="flex max-w-xl mx-auto flex-col my-5 gap-4 sm:bg-white sm:p-6 sm:rounded-md">
            @csrf
            <div class="flex gap-4">
                <span class="material-icons absolute pointer-events-none mt-3 ml-2 sm:text-gray-600">person</span>
                <input type="text" value="{{ old('username') }}" name="username" class="bg-my-ash sm:bg-white sm:border p-3 pl-9 rounded-md w-full outline-none" placeholder="Username">
            </div>
            <div class="flex gap-4">
                <span class="material-icons absolute pointer-events-none mt-3 ml-2 sm:text-gray-600">mail</span>
                <input type="text" name="email" value="{{ old('email') }}" class="bg-my-ash sm:bg-white sm:border p-3 pl-9 rounded-md w-full outline-none" placeholder="Email Address">
            </div>
            <div class="flex gap-4">
                <span class="material-icons absolute pointer-events-none mt-3 ml-2 sm:text-gray-600">pin_drop</span>
                <select name="country" class="bg-my-ash sm:bg-white sm:border sm:text-my-ash p-3 pl-9 rounded-md w-full outline-none" id="">
                    @foreach ($countries as $country)
                        <option value="{{ $country }}">{{ $country }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-4">
                <span class="material-icons absolute pointer-events-none mt-3 ml-2 sm:text-gray-600">call</span>
                <input type="text" name="number" value="{{ old('number') }}" class="bg-my-ash sm:bg-white sm:border p-3 pl-9 rounded-md w-full outline-none" placeholder="Number">
            </div>
            <div class="flex gap-4">
                <span class="material-icons absolute pointer-events-none mt-3 ml-2 sm:text-gray-600">lock</span>
                <input type="password" name="password" class="bg-my-ash sm:bg-white sm:border p-3 pl-9 rounded-md w-full outline-none" placeholder="Password">
            </div>
            <div class="flex gap-4">
                <span class="material-icons absolute pointer-events-none mt-3 ml-2 sm:text-gray-600">lock</span>
                <input type="password" name="password_confirmation" class="bg-my-ash sm:bg-white sm:border p-3 pl-9 rounded-md w-full outline-none" placeholder="Confirm Password">
            </div>
            <div class="flex gap-4">
                <span class="material-icons absolute pointer-events-none mt-3 ml-2 sm:text-gray-600">key</span>
                <input type="password" name="trade_key" class="bg-my-ash sm:bg-white sm:border p-3 pl-9 rounded-md w-full outline-none" placeholder="Trade Key">
            </div>
            <div class="flex gap-4">
                <span class="material-icons absolute pointer-events-none mt-3 ml-2 sm:text-gray-600">key</span>
                <input type="password" name="trade_key_confirmation" class="bg-my-ash sm:bg-white sm:border p-3 pl-9 rounded-md w-full outline-none" placeholder="Confirm trade key">
            </div>
            <p class="text-xs my-3 sm:text-black">Important reminder: The user needs this key to withdraw cash, deposit, transfer money, change password
                , etc. Please keep it properly!
            </p>
            <input type="submit" name="submit" value="Submit" class="w-full sm:text-white hover:text-black bg-bright-purple p-2 rounded-md cursor-pointer">
        </form>
    </div>
</body>
</html>