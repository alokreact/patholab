@extends('Front-end.layout.mainlayout')
@section('content')
    <style>
        .form-group.otp-fields input {
            width: 42px;
            height: 42px;
            margin: 0 10px 0 0;
            border-radius: 8px;
            background-color: rgb(91 108 126 / 9%);
            border: 0;
            text-align: center;
        }

        .appoinment-wrap span {
            font-size: 10px;
            margin-top: 5px;
        }

        .resend-otp {
            font-size: 14px;

        }

        .resend-otp span {
            font-size: 14px;
        }
    </style>
    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-5 text-lg">Login</h1>

                        <span class="text-white">Get access to your orders, lab tests & consultations</span>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="conatiner">
        <div class="flex flex-col lg:w-[35%] md:w-full p-4 shadow-lg mx-auto mt-4 mb-4" id="send-otp">
            <div class="mt-2 border p-4">
                <h4 class="text-xl text-green font-semibold text-center">LOGIN</h4>
            </div>

            <div class="lg:w-full md:w-full p-4">
                <form>
                    <div class="flex mb-4">
                        <div class="w-full mr-4 p-4">
                            <label for="name">Phone No:</label>
                            <input name="mobile" id="mobile" type="text" class="form-control" 
                            placeholder="Phone"
                                autocomplete="off" maxlength="10">
                            @if ($errors->has('mobile'))
                                <strong style="color:red">{{ $errors->first('mobile') }}</strong>
                            @endif
                        </div>
                    </div>

                    <div class="flex mt-4 justify-center">
                        <div
                            class="w-[70%] mr-4 flex items-center 
                            hover:text-white justify-center border hover:bg-green-400 cursor-pointer">
                            <button
                                class=" p-3   
                            text-base text-black  
                             otp-btn">
                                LOGIN

                            </button>
                            <img src="{{ asset('images/about/ArrowRight.png') }}"class="ml-2" />
                        </div>
                    </div>


                    <p class="mt-8 text-base font-semibold">
                        New on CALL LABS? 
                        <a href="{{ route('signup') }}" style="color:coral;font-weight:700"> SIGN UP</a>
                    
                    </p>

                </form>
            </div>
        </div>
    </div>

    <section class="appoinment section" id="verify-otp" style="display:none">

        <div class="container mx-auto">      
            <div class="flex flex-col lg:w-[35%] md:w-full p-4 shadow-lg mx-auto mt-4 mb-4" id="send-otp">
                <div class="mt-2 border p-4">
                    <h4 class="text-xl text-green font-semibold text-center">VERIFY OTP</h4>
                </div>
    

                    <div class="row">
                        <div class="appoinment-wrap pl-lg-5 mt-4 p-2">
                            <p class="p-2 mb-2">Enter the 4 digit OTP sent to Mobile No:</p>

                            <form action="#" id="verify-otp-form" method="post" accept-charset="utf-8">
                                @csrf
                                <div class="form-group">
                                    <div class="form-group otp-fields">
                                        <input class="otp-block otp-block-3 number_only" name="otp[]"
                                            id="otp" data-key="3" type="number" maxlength="1">
                                        <input class="otp-block otp-block-4 number_only" name="otp[]"
                                            id="otp" data-key="4" type="number" maxlength="1">
                                        <input class="otp-block otp-block-5 number_only" name="otp[]"
                                            id="otp" data-key="5" type="number" maxlength="1">
                                        <input class="otp-block otp-block-6 number_only" name="otp[]"
                                            id="otp" data-key="6" type="number" maxlength="1">
                                    </div>
                                    <div class="form-error" style="width:100%"></div>
                                </div>

                                <p class="resend-otp">
                                    <a href="#" id="resend-link" style="display: none;">Resend OTP</a>
                                    Timer: <span id="minutes">10</span>:<span id="seconds">00</span>
                                </p>
                                <button type="button" class="btn btn-success border text-black"
                                    id="btn-verify-otp">Verify</button>

                            </form>
                            
                            <span class="mt-2">
                                By logging in, you agree to our Terms and Conditions & Privacy Policy
                            </span>
                        </div>    
                    </div>  
        
        </div>
        
    </section>   


    {{-- <section class="appoinment section" id="verify-otp" style="display:none">
        <div class="side-overlay"></div>



        <div class="container img-signin">
            @include('Front-end.layout.partials.alert')

            <div class="row">
                <div class="col-lg-5">
                    <div class="mt-3">
                        <div class="feature-icon mb-3">
                            <i class="icofont-support text-lg"></i>
                        </div>
                        <span class="h3">Call for an Emergency Service!</span>
                        <h2 class="text-color mt-3">+{{ env('PHONE') }} </h2>
                    </div>
                    <img src="{{ asset('images/bg/book-test.png') }}" class="img-responsive" style="max-width: 100%" />
                </div>



                {{-- <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Email:</label>
                                        <input name="email" id="email" type="text" class="form-control"
                                            placeholder="Email" autocomplete="off">

                                        @if ($errors->has('email'))
                                            <strong style="color:red"> {{ $errors->first('email') }}</strong>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Password:</label>

                                        <input name="password" id="password" type="password" class="form-control"
                                            placeholder="Password" autocomplete="off">

                                        @if ($errors->has('password'))
                                            <strong style="color:red"> {{ $errors->first('password') }}</strong>
                                        @endif
                                    </div>
                                </div> 
                            </div>

                             <button class="btn btn-main btn-round-full" type="submit">Sign In
                                <i class="icofont-simple-right ml-2"></i> 
                        </form> 
            </div> --}}



                {{-- <div class="appoinment-wrap pl-lg-5">
                        <div class="row mt-5">
                            <div class="col-lg-8" id="send-otp">
                                <div class="form-group">
                                    <label for="name">Phone No:</label>
                                    <input name="mobile" id="mobile" type="text" class="form-control"
                                        placeholder="Mobile" autocomplete="off" maxlength="10">
                                    @if ($errors->has('mobile'))
                                        <strong style="color:red"> {{ $errors->first('mobile') }}</strong>
                                    @endif
                                </div>

                                <button class="btn btn-main btn-round-full otp-btn" type="button">Sign In<i
                                        class="icofont-simple-right ml-2"></i></a></button>


                            </div>
                        </div>
                   
                    </div> 






                <div class="col-lg-7">

                    <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
                        <h2 class="mb-2 title-color">Login</h2>

                        <p class="mb-4">Get medicine information, order medicines, book lab tests and consult online from
                            the comfort of your home.</p>
                        <form id="#" class="appoinment-form" method="post" action="{{ route('signin') }}">
                            @csrf
                            <div class="row">
                                <div class="appoinment-wrap pl-lg-5">
                                    <p>Enter the 4 digit OTP sent to Mobile No.</a></p>
                                    <form action="#" id="verify-otp-form" method="post" accept-charset="utf-8">
                                        @csrf
                                        <div class="form-group">
                                            <div class="form-group otp-fields">
                                                <input class="otp-block otp-block-3 number_only" name="otp[]"
                                                    id="otp" data-key="3" type="number" maxlength="1">
                                                <input class="otp-block otp-block-4 number_only" name="otp[]"
                                                    id="otp" data-key="4" type="number" maxlength="1">
                                                <input class="otp-block otp-block-5 number_only" name="otp[]"
                                                    id="otp" data-key="5" type="number" maxlength="1">
                                                <input class="otp-block otp-block-6 number_only" name="otp[]"
                                                    id="otp" data-key="6" type="number" maxlength="1">
                                            </div>
                                            <div class="form-error" style="width:100%"></div>
                                        </div>

                                        <p class="resend-otp">
                                            <a href="#" id="resend-link" style="display: none;">Resend OTP</a>

                                            Timer: <span id="minutes">10</span>:<span id="seconds">00</span>
                                        </p>


                                        <button type="button" class="btn btn-success border text-black"
                                            id="btn-verify-otp">Verify</button>


                                    </form>
                                    <span>
                                        By logging in, you agree to our Terms and Conditions & Privacy Policy</span>

                                </div>



                            </div>
                    </div>
                </div>
            </div>
    </section> --}}
@endsection
