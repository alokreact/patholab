<body id="top">

    <div class="flex items-center justify-between p-2  text-white" style="background-color: #28a745">
        <div class="hidden md:flex items-center space-x-4 ">
            {{-- <img src="logo.png" alt="Logo" class="w-8 h-8" />
                <span class="text-lg font-semibold">Your Logo</span> --}}

        </div>

        <div class="flex-grow mx-4  items-center flex justify-center ">
            <form action="{{ route('searchsubtest') }}" method="post" id="searchSubtest-form"
                class="w-full flex justify-center">
                @csrf
                <input type="text" placeholder="Search for Tests (CBC, MRI, etc...)"
                    class="w-full  md:w-[50%]  p-4 text-center border border-green-400 shadow-md 
                    bg-white rounded-full  text-black focus:outline-none"
                    id="search-input" />

        </div>
        <input type="hidden" id="selectedProduct" name="subtest" required>
        </form>

        <div id="search-results" class="list-group mt-2 w-[50%]"></div>


        <div class="hidden md:flex items-center space-x-6">
            <div class="relative flex justify-space p-2">
                <span class="text-xl">
                    @if (auth()->check())
                        @can('isUser')
                            <a href="{{ route('address') }}">
                                <img src="{{ asset('images/about/User.png') }}" />
                            </a>
                        @endcan
                    @else
                        <a href="{{ route('signin') }}">
                            <img src="{{ asset('images/about/User.png') }}" />
                        </a>
                    @endif

                </span>

            </div>
            <div class="text-xl flex justify-space p-2">
                <a href="{{ route('cart') }}" class="call-us-desk mr-2">
                    <img src="{{ asset('images/about/cart.png') }}" />
                </a>
            </div>
        </div>

        <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>


    </div>


    <div class="bg-gray-100 shadow-md flex text-white justify-end w-full">

        <div class="md:hidden flex">
            <button class="text-xl flex flex-start menu_toggle">
                <i class="icofont-navigation-menu text-black"></i>
            </button>

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

        </div>

        <div
            class="hidden md:flex justify-between items-center space-x-4 text-base 
        font-semibold text-black w-full">

            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/Logo-removebg.png') }}" alt="" class=""
                    style="height:85px; width:215px">
            </a>

            <ul class="flex text-xl text-black">
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
