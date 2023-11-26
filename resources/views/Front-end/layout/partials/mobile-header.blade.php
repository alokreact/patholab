<div class="flex justify-between p-2 w-full">
    <a class="flex justify-start" href="{{ route('home') }}">
        <img src="{{ asset('images/Logo-removebg.png') }}" alt="" class="w-[160px] h-[80px]">
    </a>


    <a href="{{ route('cart') }}" class="call-us-desk mr-1 text-black p-2">
        <i class="icofont-cart text-xl text-black"></i>
    </a>


    <button class="text-xl flex flex-start menu_toggle p-3">
        <i class="icofont-navigation-menu text-black"></i>
    </button>

</div>

<div class="hidden fixed inset-0 bg-gray-100 bg-opacity-0 z-50 mx-auto" id="mobile-menu">
                <div class="bg-gray-100 shadow:lg flex flex-col w-64 h-full py-4 p-4">
                    <button class="text-xl flex justify-end sidebar_toggle">
                        <i class="icofont-close-circled text-black"></i>
                    </button>


                    <ul class="space-y-2 p-3 text-xl text-black">
                        <li><a class="mr-4" href="{{ route('about') }}">About</a>
                        </li>
                        <li> <a class="mr-4" href="{{ route('category.all') }}">Packages</a>
                        </li>
                        <li> <a class="mr-4" href="{{ route('contact') }}">Contact</a>
                        </li>
                        <li> <a class="mr-4" href="{{ route('prescription') }}" style="color:#00a651">Upload
                                Prescription</a></li>
                    </ul>
                </div>
            </div>