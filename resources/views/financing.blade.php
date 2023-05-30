<section class="flex-grow p-4 bg-black hidden" id="financing">
    <section id="financing-port">
        <div class="bg-my-ash w-full p-4 h-28 flex align-middle justify-between rounded-md sticky">
            <img src="{{ asset('images/logo.png') }}" alt="">
            <div class="flex flex-col gap-4">
                <p class="text-orange-500">{{ $balance }} ≈ ${{ $balance }}</p>
                <p>Balance</p>
            </div>
            @if (!Auth::check())
                <a class="bg-blue-700 h-10 px-2 rounded-md text-white leading-10" href="{{ route('userLoginPage') }}">Login</a>
            @endif
        </div>
        <div class="my-2">
            <p>Products</p>
            <div class="my-2 flex flex-col gap-1">
                <div class="bg-my-ash w-full rounded-lg p-3">
                    <div class="flex justify-between gap-2 leading-10">
                        <img src="{{ asset('images/logo.png') }}" class="h-10" alt="">                    
                        <p>USDT</p>
                        <p>60 Days</p>
                        <p>30.6% yield</p>
                    </div>
                    <button class="w-full p-2 bg-blue-700 rounded-md mt-4">Buy</button>
                </div>
                <div class="bg-my-ash w-full rounded-lg p-3">
                    <div class="flex justify-between gap-2 leading-10">
                        <img src="{{ asset('images/logo.png') }}" class="h-10" alt="">                    
                        <p>USDT</p>
                        <p>90 Days</p>
                        <p>52.8% yield</p>
                    </div>
                    <button class="w-full p-2 bg-blue-700 rounded-md mt-4">Buy</button>
                </div>
                <div class="bg-my-ash w-full rounded-lg p-3">
                    <div class="flex justify-between gap-2 leading-10">
                        <img src="{{ asset('images/logo.png') }}" class="h-10" alt="">                    
                        <p>USDT</p>
                        <p>120 Days</p>
                        <p>63.5% yield</p>
                    </div>
                    <button class="w-full p-2 bg-blue-700 rounded-md mt-4">Buy</button>
                </div>
            </div>
        </div>
    </section>
</section>