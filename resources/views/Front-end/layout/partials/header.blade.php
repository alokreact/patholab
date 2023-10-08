<body id="top">
    <header>
        <div class="header-top-bar">
            <div class="container">


                <div class="col-lg-2 col-sm-12 mr-5 address">
                    <ul class="top-bar-info list-inline-item pl-0 mb-0">
                        <li class="list-inline-item">
                            <i class="icofont-location-pin mr-2"></i>Vasavi Colony, Kothapet, Hyderabad.
                        </li>
                    </ul>
                </div>

                <div class="col-lg-7 col-md-7 col-sm-8 mr-2">
                    <form action="{{ route('searchsubtest') }}" method="post" id="searchSubtest-form">
                        @csrf
                        <div class="select-container" style="display: flex">
                            <div class="p-1 bg-light shadow-sm border-rad">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button id="button-addon2" type="submit" class="btn btn-link text-warning">
                                            <i class="icofont-search-1"></i></button>
                                    </div>
                                    <input type="search" placeholder="Search for Tests (CBC, MRI, etc.)"
                                        aria-describedby="button-addon2"
                                        class="form-control border-0 bg-light col-md-10" id="search-input"
                                        style="font-size:20px" required>
                                </div>
                            </div>
                            <input type="hidden" id="selectedProduct" name="subtest" required>


                            <div id="search-results" class="list-group mt-2"></div>
                        </div>

                    </form>

                </div>

                <div class="right-head-desk">

                    <a class="call-us-desk" href="#" title="call us">
                        <i class="icofont-ui-call"></i> <span>
                            CALL US NOW 7893762020</span>
                    </a>

                    <a href="{{ route('cart') }}" class="call-us-desk">
                        <i class="icofont-cart"></i>
                        {{-- @php
                            $cart_count = 0;
                            foreach ($carts as $key => $cart) {
                                $cart_count = $cart->cartItems->count();
                            }          
                        @endphp --}}
                        <span
                            class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                    </a>
                </div>
            </div>
        </div>




        <nav class="navbar navbar-expand-lg navigation" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/Logo-removebg.png') }}" alt="" class="img-fluid"
                        style="height:65px; width:168px">
                </a>
                <button class="navbar-toggler" type="button" id="menu-toggle">
                    <span class="icofont-navigation-menu"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarmain">

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('category.all') }}">Packages</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('prescription') }}"
                                style="color:#00a651">Upload Prescription</a></li>
                    </ul>


                </div>
            </div>



            <div class="signup">
                @if (auth()->check())
                    @can('isUser')
                        <a href="{{ route('address') }}" type="button" class="btn">
                            <button class="btn btn-signup">Profile</button>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-signin">Logout</button>
                        </form>
                    @endcan
                @else
                    <a href="{{ route('signin') }}" type="button" class="btn">
                        <button class="btn btn-signin">SignIn</button>
                    </a>
                    <a href="{{ route('signup') }}" type="button" class="btn">
                        <button class="btn btn-signup">SignUp</button>
                    </a>
                @endif
            </div>
        </nav>


        <div id="wrapper" style="display: none">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="#">CALL LABS</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('category.all') }}">Packages</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('prescription') }}"
                            style="color:#00a651">Upload Prescription</a></li>

                </ul>

                <div class="mobile-signup">
                    @if (auth()->check())
                        @can('isUser')
                            <a href="{{ route('address') }}" type="button" class="btn">
                                <button class="btn btn-signup">Profile</button>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-signin">Logout</button>
                            </form>
                        @endcan
                    @else
                        <a href="{{ route('signin') }}" type="button" class="btn">
                            <button class="btn btn-signin">SignIn</button>
                        </a>
                        <a href="{{ route('signup') }}" type="button" class="btn">
                            <button class="btn btn-signup">SignUp</button>
                        </a>
                    @endif

                </div>
            </div>
        </div>
     
    </header>
