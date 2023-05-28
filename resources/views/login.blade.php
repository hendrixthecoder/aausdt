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
<body class="bg-gray-200 overflow-hidden text-white h-screen">
    <div class="bg-black w-full h-2/6 rounded-b-full pt-8 text-center">
        <img src="{{ asset('images/logo.png') }}" class="h-24 mx-auto" alt="">
        <h3 class="">Financial Income Platform</h3>
    </div>
    <div class="mx-auto w-9/12 rounded-md bg-white -mt-10 ">
        @if ($errors->any())
            <ul class="my-4">
                @foreach ($errors->all() as $error)
                <li class="p-3 my-2 bg-red-700">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="" method="post" class="p-4 flex flex-col gap-4">
            @csrf
            <div>
                <span class="material-icons absolute text-gray-400 pointer-events-none leading-10 mt-2 ml-2">person</span>
                <input required type="text" name="email" placeholder="Email Address" class="w-full text-black caret-black bg-gray-200 rounded-md outline-none p-4 pl-10">
            </div>
            <div>
                <span class="material-icons absolute text-gray-400 pointer-events-none leading-10 mt-2 ml-2">lock</span>
                <input required type="password" name="password" placeholder="Password" class="w-full text-black caret-black bg-gray-200 rounded-md outline-none p-4 pl-10">
            </div>
            <input type="submit" value="Login" class="bg-black w-full p-4 rounded-md cursor-pointer">
        </form>
        <div class="flex justify-between text-black text-sm p-4">
            <a href="{{ route('userRegisterPage') }}">Register</a>
            <a href="">Forgot Password</a>
        </div>
    </div>

</body>
</html>

