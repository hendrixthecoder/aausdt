<section class="flex-grow bg-black hidden" id="account">
    <section id="account-port">
        <div class="bg-deep-blue w-full rounded-b-full overflow-x-hidden">
            <div class="flex justify-between p-4 ">
                <div class="flex gap-5 ml-3">
                    <img src="{{ asset('images/logo.png') }}" class="h-16" alt="">
                    <h3 class="pt-5 text-xl">{{ Auth::user()->username }}</h3>
                </div>
                <div class="flex bg-deeper-blue mr-3 h-7 p-1 mt-5 rounded-md">
                    <span class="material-icons text-sm">military_tech</span>
                    <p class="text-xs">VIP Upgrade</p>
                </div>
            </div>
            <div class="border-b-[0.1px] border-gray-400"></div>
            <div class="flex gap-7 my-5 mb-10 justify-center text-xs">
                <div class="flex flex-col text-center">
                    <p class="text-orange-400"><span class="text-lg">0</span> USDT</p>
                    <p>Today transfer in limit</p>
                </div>

                <div class="border-r-[0.1px] border-gray-400 h-12"></div>

                <div class="flex flex-col text-center">
                    <p class="text-orange-400"><span class="text-lg">0</span> USDT</p>
                    <p>Monthly transfer in limit</p>
                </div>
            </div>
        </div>
        <div class="p-4 -mt-12">
            <div class="bg-my-ash w-full p-4 rounded-md">
                <div class="w-full mb-3 flex gap-4">
                    <img src="{{ asset('images/moneybag.png') }}" class="h-14" alt="">
                    <div class="flex flex-col gap-2">
                        <p class="text-orange-400">0USDT ≈ $0</p>
                        <p>Balance</p>
                    </div>
                </div>

                <div class="flex gap-4 justify-between text-xs">
                    <div class="bg-deep-blue w-4/12 rounded-md text-center p-2">
                        <span class="material-icons">account_balance_wallet</span>
                        <p>Deposit</p>
                    </div>
                    <div class="bg-deep-blue w-4/12 rounded-md text-center p-2">
                        <span class="material-icons">local_atm</span>
                        <p>Withdraw</p>
                    </div>
                    <div class="bg-deep-blue w-4/12 rounded-md text-center p-2">
                        <span class="material-icons">payments</span>
                        <p>Transfer</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4">
            <div class="bg-my-ash w-full p-4 rounded-md flex gap-20 my-5">
                <span class="material-icons text-deep-blue">notifications</span>
                <p>Your deposit has been refused</p>
            </div>
            <div class="my-5">
                <h3>Other Services</h3>
                <div class="my-3 rounded-md bg-my-ash w-full grid grid-cols-4 p-4 gap-5">
                    <div class="text-center cursor-pointer">
                        <span class="material-icons text-deep-blue">account_balance_wallet</span>
                        <p class="text-xs">Financing</p>
                    </div>
                    <div class="text-center cursor-pointer">
                        <span class="material-icons text-deep-blue">person</span>
                        <p class="text-xs">Security</p>
                    </div>
                    <div class="text-center cursor-pointer">
                        <span class="material-icons text-deep-blue">notifications</span>
                        <p class="text-xs">Message</p>
                    </div>
                    <div class="text-center cursor-pointer">
                        <span class="material-icons text-deep-blue">headset_mic</span>
                        <p class="text-xs">Contact</p>
                    </div>
                    <div class="text-center cursor-pointer">
                        <a href="{{ route('userQuestionsPage') }}" class="text-xs block">
                            <span class="material-icons text-deep-blue">help</span>
                            <p class="text-xs">Questions</p>
                        </a>
                    </div>
                    <div class="text-center cursor-pointer">
                        <a href="{{ route('userWalletsPage') }}" class="text-xs block">
                            <span class="material-icons text-deep-blue">wallet</span>
                            <p class="text-xs">Wallet</p>
                        </a>
                    </div>
                    <div class="text-center cursor-pointer">
                        <span class="material-icons text-deep-blue">power_settings_new</span>
                        <p class="text-xs">Logout</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<script>
    $(document).ready(function () {
        
    })
</script>