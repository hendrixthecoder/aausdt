<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="text-white">
    <div class="flex flex-col h-screen">
        <nav class="flex justify-between p-5 bg-black text-white">
            <div class="">
                <img src="{{ asset('images/logo.png') }}" class="h-10 inline" alt="">
                <span>AAUSDT</span>
            </div>
            <div class="max-sm:hidden">
                <a href="">Home</a>
                <a href="">Financing</a>
                <a href="">VIP</a>
                <a href="">Account</a>
            </div>
        </nav>
        {{-- Includes start --}}
        @include('financing')
        @include('vip')
        @if (Auth::check())
            @include('account')
        @endif
        {{-- Includes end --}}
        <section class="flex-grow p-4 bg-black" id="home"> 
            <section id="financing-port">
                {{-- Financing starts here --}}
                <div class="flex justify-between text-white mb-3">
                    <h4 class="font-semibold border-l-2 border-blue-700 pl-2">Financing</h4>
                    <h4 class="flex cursor-pointer"><span class="material-icons">add_circle</span>More</h4>
                </div>
                <div class="grid grid-cols-3 gap-2 max-sm:text-sm">
                    <div class="bg-my-ash  h-28 rounded-lg p-3">
                        <div class="flex">
                            <img src="{{ asset('images/logo.png') }}" class="h-8 " alt="">
                            <span class="pl-2">USDT 120 Days</span>
                        </div>
                        <p><span class="font-bold text-lg">63.5%</span> yield</p>
                    </div>
                    <div class="bg-my-ash  h-28 rounded-lg p-3">
                        <div class="flex">
                            <img src="{{ asset('images/logo.png') }}" class="h-8" alt="">
                            <span class="pl-2">USDT 90 Days</span>
                        </div>
                        <p><span class="font-bold text-lg">53.8%</span> yield</p>
                    </div>
                    
                    <div class="bg-my-ash h-28 rounded-lg p-3">
                        <div class="flex">
                            <img src="{{ asset('images/logo.png') }}" class="h-8" alt="">
                            <span class="pl-2">USDT 60 Days</span>
                        </div>
                        <p><span class="font-bold text-lg">30.6%</span> yield</p>
                    </div>
                </div>
            </section>
            {{-- Financing ends here --}}

            {{-- Quotation starts here --}}
            <section id="quotation-port">
                <div class="flex justify-between text-white my-3">
                    <h4 class="font-semibold border-l-2 border-blue-700 pl-2">Quotation</h4>
                </div>
                <div class="flex flex-col gap-1">
                    <div class="bg-my-ash w-full h-16 rounded-lg p-3 flex gap-2">
                        <img src="{{ asset('images/btc.jpeg') }}" class="h-10" alt="">
                        <div class="flex justify-between w-full leading-10">
                            <p>BTC/<span class="text-xs">USDT</span></p>
                            <p>$265670.56</p>
                            <p>-0.01%</p>
                        </div>
                    </div>
                    <div class="bg-my-ash w-full h-16 rounded-lg p-3 flex gap-2">
                        <img src="{{ asset('images/eth.png') }}" class="h-10" alt="">
                        <div class="flex justify-between w-full leading-10">
                            <p>ETH/<span class="text-xs">USDT</span></p>
                            <p>$265670.56</p>
                            <p>-0.01%</p>
                        </div>
                    </div>
                    <div class="bg-my-ash w-full h-16 rounded-lg p-3 flex gap-2">
                        <img src="{{ asset('images/logo.png') }}" class="h-10" alt="">
                        <div class="flex justify-between w-full leading-10">
                            <p>BTC/<span class="text-xs">USDT</span></p>
                            <p>$265670.56</p>
                            <p>-0.01%</p>
                        </div>
                    </div>
                </div>
            </section>
            {{-- Quotation ends here --}}

            {{-- Revenue starts here --}}
            <section id="revenue-port" class="h-96">
                <div class="flex justify-between text-white my-3">
                    <h4 class="font-semibold border-l-2 border-blue-700 pl-2">Revenue</h4>
                </div>
                <div class="grid grid-cols-3 border">
                    <div class="bg-my-ash text-center border-r p-2">Username</div>
                    <div class="bg-my-ash text-center border-r p-2">Amount</div>
                    <div class="bg-my-ash text-center p-2">Date</div>
                </div>

            </section>


        </section>
        <div id="mobile-nav" class="sm:hidden flex justify-between p-5 pt-3 border-t shadwo-sm sticky bottom-0 mb-4 left-0 mg:hidden lg:hidden h-20 bg-black text-white w-full">
            <span class="cursor-pointer hover:text-blue-700 nav" id="homeBtn">
                <span class="material-icons block ml-2">home</span>
                Home
            </span>
            <span class="cursor-pointer hover:text-blue-700 nav" id="financingBtn">
                <span class="material-icons block ml-5">account_balance_wallet</span>
                Financing
            </span>
            <span class="cursor-pointer hover:text-blue-700 nav" id="vipBtn">
                <span class="material-icons block ">military_tech</span>
                VIP
            </span>
            @if (Auth::check())
            <span class="cursor-pointer hover:text-blue-700 nav" id="accountBtn">
                <span class="material-icons block ml-5">account_circle</span>
                Account
            </span>   
            @endif
        </div>
        <footer class="max-sm:hidden bg-gray-700" >
            laptop footer
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('#home').hide()
            $('#vip').hide()
            $('#financing').hide()
            $('#account').show()

            $('#homeBtn').click(function () {
                $('#financing').hide()
                $('#vip').hide()
                $('#account').hide()
                $('#home').show()
            })
            $('#financingBtn').click(function () {
                $('#home').hide()
                $('#vip').hide()
                $('#account').hide()
                $('#financing').show()
            })
            $('#vipBtn').click(function () {
                $('#home').hide()
                $('#financing').hide()
                $('#account').hide()
                $('#vip').show()
            })
            $('#accountBtn').click(function () {
                $('#home').hide()
                $('#financing').hide()
                $('#vip').hide()
                $('#account').show()
            })

        });


        </script>
</body>
</html>
