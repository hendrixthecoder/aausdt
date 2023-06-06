<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        dialog::backdrop {
            background-color: rgba(0, 0, 0, 0.5)
        }
    </style>
</head>
<body class="text-white bg-black">
    <div class="flex flex-col h-screen">
        <nav class="flex justify-between p-5 bg-black text-white">
            <div class="">
                <img src="{{ asset('images/logo.png') }}" class="h-10 inline" alt="">
                <span>AAUSDT</span>
            </div>
            <div class="max-lg:hidden flex gap-5 ">
                <a data-id="homeBtn" class="cursor-pointer hover:text-deep-blue">Home</a>
                <a data-id="financingBtn" class="cursor-pointer hover:text-deep-blue">Financing</a>
                <a data-id="vipBtn" class="cursor-pointer hover:text-deep-blue">VIP</a>
                @if (Auth::check())
                    <a data-id="accountBtn" class="cursor-pointer hover:text-deep-blue">Account</a>
                @endif
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
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                     <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/slide1.jpeg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/slide2.jpeg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/slide3.jpeg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
            
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div> 
            <section id="financing-port" class="mt-4">
                {{-- Financing starts here --}}
                <div class="flex justify-between text-white mb-3">
                    <h4 class="font-semibold border-l-2 border-blue-700 pl-2">Financing</h4>
                    <h4 class="flex cursor-pointer" data-id="financingBtn"><span class="material-icons">add_circle</span>More</h4>
                </div>
                <div class="grid grid-cols-3 gap-2 max-sm:text-sm">
                    <div class="bg-my-ash  h-28 rounded-lg p-3">
                        <div class="flex">
                            <img src="{{ asset('images/logo.png') }}" class="h-8 " alt="">
                            <span class="pl-2 max-sm:text-[10px]">USDT 120 Days</span>
                        </div>
                        <p><span class="font-bold text-lg">63.5%</span> yield</p>
                    </div>
                    <div class="bg-my-ash  h-28 rounded-lg p-3">
                        <div class="flex">
                            <img src="{{ asset('images/logo.png') }}" class="h-8" alt="">
                            <span class="pl-2 max-sm:text-[10px]">USDT 90 Days</span>
                        </div>
                        <p><span class="font-bold text-lg">53.8%</span> yield</p>
                    </div>
                    
                    <div class="bg-my-ash h-28 rounded-lg p-3">
                        <div class="flex">
                            <img src="{{ asset('images/logo.png') }}" class="h-8" alt="">
                            <span class="pl-2 max-sm:text-[10px]">USDT 60 Days</span>
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
                        <div class="flex justify-between w-full leading-10" id="btc-board">

                        </div>
                    </div>
                    <div class="bg-my-ash w-full h-16 rounded-lg p-3 flex gap-2">
                        <img src="{{ asset('images/eth.png') }}" class="h-10" alt="">
                        <div class="flex justify-between w-full leading-10" id="eth-board">

                        </div>
                    </div>
                    <div class="bg-my-ash w-full h-16 rounded-lg p-3 flex gap-2">
                        <img src="{{ asset('images/logo.png') }}" class="h-10" alt="">
                        <div class="flex justify-between w-full leading-10" id="usdt-board">

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
                <marquee behavior="scroll" class="bg-my-ash h-44" scrollamount="4" direction="up">
                    <div class="grid grid-cols-3" id="board">
                        <div class="bg-my-ash text-center p-2">jn*****ig</div>
                        <div class="bg-my-ash text-center p-2">1212.0</div>
                        <div class="bg-my-ash text-center p-2">Date</div>
                        <div class="bg-my-ash text-center p-2">Username</div>
                        <div class="bg-my-ash text-center p-2">39028.90</div>
                        <div class="bg-my-ash text-center p-2">Date</div>
                        <div class="bg-my-ash text-center p-2">Username</div>
                        <div class="bg-my-ash text-center p-2">5345345</div>
                        <div class="bg-my-ash text-center p-2">Date</div>
                        <div class="bg-my-ash text-center p-2">Username</div>
                        <div class="bg-my-ash text-center p-2">25</div>
                        <div class="bg-my-ash text-center p-2">Date</div>
                        <div class="bg-my-ash text-center p-2">Username</div>
                        <div class="bg-my-ash text-center p-2">2321</div>
                        <div class="bg-my-ash text-center p-2">Date</div>
                        <div class="bg-my-ash text-center p-2">Username</div>
                        <div class="bg-my-ash text-center p-2">34242</div>
                        <div class="bg-my-ash text-center p-2">Date</div>
                        <div class="bg-my-ash text-center p-2">Username</div>
                        <div class="bg-my-ash text-center p-2">34134</div>
                        <div class="bg-my-ash text-center p-2">Date</div>
                        <div class="bg-my-ash text-center p-2">Username</div>
                        <div class="bg-my-ash text-center p-2">13413</div>
                        <div class="bg-my-ash text-center p-2">Date</div>
                        <div class="bg-my-ash text-center p-2">Username</div>
                        <div class="bg-my-ash text-center p-2">62424</div>
                        <div class="bg-my-ash text-center p-2">Date</div>
                        <div class="bg-my-ash text-center p-2">Username</div>
                        <div class="bg-my-ash text-center p-2">24524</div>
                        <div class="bg-my-ash text-center p-2">Date</div>
                    </div>
                </marquee>
            </section>

        </section>
        <div id="mobile-nav" class="flex justify-between p-5 pt-3 border-t sticky bottom-0 mb-4 left-0 h-20 bg-black text-white w-full lg:hidden md:mb-0 ">
            <span class="cursor-pointer hover:text-blue-700 nav" data-id="homeBtn" id="homeBtn">
                <span class="material-icons block ml-2">home</span>
                Home
            </span>
            <span class="cursor-pointer hover:text-blue-700 nav" data-id="financingBtn" id="financingBtn">
                <span class="material-icons block ml-5">account_balance_wallet</span>
                Financing
            </span>
            <span class="cursor-pointer hover:text-blue-700 nav" data-id="vipBtn" id="vipBtn">
                <span class="material-icons block ">military_tech</span>
                VIP
            </span>
            @if (Auth::check())
            <span class="cursor-pointer hover:text-blue-700 nav" data-id="accountBtn" id="accountBtn">
                <span class="material-icons block ml-5">account_circle</span>
                Account
            </span>   
            @endif
        </div>
        <footer class="max-lg:hidden bg-black border-t border-white p-4 " >
            <div class="grid grid-cols-3 place-items-center gap-40   ">
                <div class="flex flex-col gap-5 md:ml-20">
                    <h3>Financial Income Platform</h3>
                    <div class="flex gap-5 ">
                        <p data-id="homeBtn" class="cursor-pointer hover:text-deep-blue">Home</p>
                        <p data-id="financingBtn" class="cursor-pointer hover:text-deep-blue">Financing</p>
                        <p data-id="vipBtn" class="cursor-pointer hover:text-deep-blue">VIP</p>
                        @if (Auth::check())
                            <p data-id="accountBtn" class="cursor-pointer hover:text-deep-blue">Account</p>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <h3>Online Service</h3>
                    <h3>Telegram Communication</h3>
                </div>
                <div class="flex flex-col gap-5">
                    <h3>Customer Service Email</h3>
                    <h3>{{ $email }}</h3>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <script>
        
        $(document).ready(function () {

            setInterval(() => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('currencies') }}",
                    dataType: "JSON",
                    success: function (response) {

                        const { btc, eth, usdt } = response;
                        
                        $('#btc-board').html('')
                        $('#eth-board').html('')
                        $('#usdt-board').html('')
    
                        $('#btc-board').append(`
                            <p>${btc.name}/<span class="text-xs">${btc.name}</span></p>
                            <p class="text-green-700">$${btc.amount}</p>
                            <p class="text-red-700">-${btc.percentage}%</p>
                        `)
    
                        $('#eth-board').append(`
                            <p>${eth.name}/<span class="text-xs">${eth.name}</span></p>
                            <p class="text-green-700">$${eth.amount}</p>
                            <p class="text-green-700">+${eth.percentage}%</p>
                        `)
    
                        $('#usdt-board').append(`
                            <p>${usdt.name}/<span class="text-xs">${usdt.name}</span></p>
                            <p class="text-red-700">$${usdt.amount}</p>
                            <p class="text-red-700">-${usdt.percentage}%</p>
                        `)
                        
                    }
                });
            }, 2000);

            const getCurrencies = () =>{

                $.ajax({
                    type: "GET",
                    url: "{{ route('currencies') }}",
                    dataType: "JSON",
                    success: function (response) {
                        const { btc, eth, usdt } = response;
                        $('#btc-board').html('')
                        $('#eth-board').html('')
                        $('#usdt-board').html('')
    
                        $('#btc-board').append(`
                            <p>${btc.name}/<span class="text-xs">${btc.name}</span></p>
                            <p>$${btc.amount}</p>
                            <p>${btc.percentage}%</p>
                        `)
    
                        $('#eth-board').append(`
                            <p>${eth.name}/<span class="text-xs">${eth.name}</span></p>
                            <p>$${eth.amount}</p>
                            <p>${eth.percentage}%</p>
                        `)
    
                        $('#usdt-board').append(`
                            <p>${usdt.name}/<span class="text-xs">${usdt.name}</span></p>
                            <p>$${usdt.amount}</p>
                            <p>${usdt.percentage}%</p>
                        `)
                        
                    }
                });
            }

            getCurrencies()


            $('#home').show()
            $('#vip').hide()
            $('#financing').hide()
            $('#account').hide()

            $('[data-id=homeBtn]').click(function () {
                $('#financing').hide()
                $('#vip').hide()
                $('#account').hide()
                $('#home').show()
            })

            $('[data-id=financingBtn]').click(function () {
                $('#home').hide()
                $('#vip').hide()
                $('#account').hide()
                $('#financing').show()
            })

            $('[data-id=vipBtn]').click(function () {
                $('#home').hide()
                $('#financing').hide()
                $('#account').hide()
                $('#vip').show()
            })

            $('[data-id=accountBtn]').click(function () {
                $('#home').hide()
                $('#financing').hide()
                $('#vip').hide()
                $('#account').show()
            })

            $.ajax({
                type: "GET",
                url: "{{ route('getRand') }}",
                dataType: "JSON",
                success: function (response) {
                    $('#board').html('')
                    let { data } = response.data
                    $.each(response.data, function (key, value) { 
                         $('#board').append(
                            `<div class="bg-my-ash text-center p-2">${value.name}</div>
                            <div class="bg-my-ash text-center p-2">${value.amount}</div>
                            <div class="bg-my-ash text-center p-2">${value.today}</div>
                            `
                        )
                    });
                }
            });

        });


        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>
