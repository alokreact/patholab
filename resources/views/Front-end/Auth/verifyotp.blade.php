<section class="appoinment section" id="verify-otp" style="display:none">

    <div class="container">

        <div class="flex flex-col lg:w-[35%] md:w-full p-4 shadow-lg mx-auto mt-4 mb-4" id="send-otp">
            <div class="mt-2 border p-4">
                <h4 class="text-xl text-green font-semibold text-center">VERIFY OTP</h4>
            </div>


            <div class="row">
                <div class="appoinment-wrap pl-lg-5 mt-4 p-2 w-full flex flex-col">

                    <p class="p-2 mb-2 flex justify-center w-full">Enter the 4 digit OTP sent to Mobile No:</p>


                    <form action="#" id="verify-otp-form" method="post" accept-charset="utf-8">
                        @csrf
                        <div class="form-group flex justify-center flex-wrap">

                            @for ($i = 1; $i <= 4; $i++)
                                <input type="text" name="otp[]"
                                    class="w-16 h-10 text-4xl mx-1 text-center border rounded" maxlength="1"
                                    autocomplete="off" required />
                            @endfor


                            <div class="p-2 mt-4 w-[70%] mr-4 flex 
                            hover:text-white justify-center border hover:bg-green-400 cursor-pointer outline-0">
                              
                            <button type="button" class="text-black p-3 text-base font-semibold text-base"
                                    id="btn-verify-otp">VERIFY</button>
    
                                    <img src="{{ asset('images/about/ArrowRight.png') }}"class="ml-2 p-3" />
                   
                            </div>
    
                        </div>


                      
                    </form>

                    <p class="resend-otp mt-2">
                        <a href="#" id="resend-link" style="display: none;">Resend OTP</a>
                        Timer: <span id="minutes">10</span>:<span id="seconds">00</span>
                    </p>

                    <span class="mt-2">
                        By logging in, you agree to our Terms and Conditions & Privacy Policy
                    </span>
                </div>
            </div>

        </div>

</section>
