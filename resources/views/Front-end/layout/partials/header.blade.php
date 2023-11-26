<body id="top">
    <div class="flex items-center justify-between p-2  text-white" style="background-color: #28a745">

        <div class="flex flex-col p-2 w-full relative">
            <div class="flex-grow mx-4  items-center flex justify-center ">
                {{-- {{ route('searchsubtest') }} --}}
                {{-- <form action="" method="post" id="searchSubtest-form" class="w-full flex justify-center">
                    @csrf --}}

                    <input type="text" placeholder="Search for Tests (CBC, MRI, etc...)"
                        class="w-full  md:w-[50%]  p-4 text-center border border-green-400 shadow-md 
                    bg-white rounded-full  text-black focus:outline-none"
                        id="search-input" autocomplete="off" />

                    {{-- <input type="hidden" id="selectedProduct" name="subtest" required>
                </form> --}}
            </div>

            <div id="search"
                class="list-group mt-2 w-[70%] md:w-[40%]  flex-col p-2  mx-auto Z-1 absolute top-1/2 left-[30%] h-[230px]"
                style="z-index: 1">
            </div>
        </div>


        <div class="hidden md:flex items-center space-x-6">
            <div class="relative flex justify-between p-2">
                @if (auth()->check())
                    @can('isUser')
                        <span class="text-2xl">
                            <a href="{{ route('address') }}">
                                <i class="icofont-user-male text-2xl text-white"></i>
                            </a>
                        </span>
                    @endcan
                @else
                    <a href="{{ route('signin') }}">
                        <i class="icofont-user-male text-2xl text-white"></i>
                    </a>
                @endif
            </div>


            <div class="relative flex justify-between p-2">
                @if (auth()->check())
                    @can('isUser')
                        <span class="text-2xl">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="p-2" type="submit">
                                    <i class="icofont-sign-out text-2xl text-white"></i>
                                </button>
                            </form>

                        </span>
                    @endcan
                @endif
            </div>

            <div class="text-xl flex justify-space p-2">
                <a href="{{ route('cart') }}" class="call-us-desk mr-2">
                    <i class="icofont-cart text-2xl text-white"></i>
                </a>
            </div>
        </div>

        @php
            //print_r((array)session('cart'));
            $cartCount = 0;
            foreach ((array) session('cart') as $key => $value) {
                $cartCount = count($value);
            }
        @endphp

        <span class="badge badge-pill badge-danger">{{ $cartCount }}</span>


    </div>


    <div class="bg-gray-100 shadow-md flex text-white justify-end w-full">

        <div class="md:hidden flex w-full">


            @include('Front-end.layout.partials.mobile-header')

        </div>

        <div
            class="hidden md:flex justify-between items-center space-x-4 text-base 
        font-semibold text-black w-full">

            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/Logo-removebg.png') }}" alt="" class=""
                    style="height:85px; width:215px">
            </a>

            <ul class="flex text-basic text-black">
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
