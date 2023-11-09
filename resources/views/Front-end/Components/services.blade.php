<section class="section service">
    <div class="container">
        <div class="flex justify-between items-center">
            <div class="section-title">
                <h2 class="font-mediom text-2xl underline">Explore More</h2>
            </div>
            {{-- <div class="divider mx-left my-4"></div> --}}
        </div>


        <div class="flex md:flex-row flex-col  justify-around p-2">
            <div
                class="relative bg-contain bg-center w-full md:w-1/3 bg-white text-white p-4 m-2 rounded  with-image top-brands">

                <div class='flex flex-row justify-between inner-brand align-items'>
                    <div class='p-2 flex flex-col'>

                        <h3 class='font-semibold text-xl text-black'>All Your HYPERTNSION related queries answered.</h3>
                        <a href="{{route('testbyorgan','15')}}">
                            <button class="bg-yellow-500 text-white py-2 px-4 rounded-lg shadow-lg mt-4">
                                Check Now!
                            </button>
                        </a>
                    </div>
                    <img src="{{ asset('images/about/feature-brand.png') }}" class='w-[310px]  object-cover' />
                </div>

            </div>

            <div
                class="relative bg-contain bg-center w-full md:w-1/3 bg-white text-white p-4 m-2 rounded  with-image top-brands">



                <div class='flex flex-row justify-between inner-brand align-items'>

                    <div class='p-2 flex flex-col'>

                        <h3 class='font-semibold text-xl text-black'>Book a package and get 20% Off on every order! 
                            Become a Member.</h3>

                            <button class="bg-yellow-500 text-white py-2 px-4 rounded-lg shadow-lg mt-4">
                                Check Now!
                            </button>

                    </div>
                    <img src={{ asset('images/about/feature-brand.png') }} class='w-[310px]  object-cover' />
                </div>


            </div>


            <div
                class="relative bg-contain bg-center w-full md:w-1/3 bg-white text-white p-4 m-2 rounded  with-image top-brands">


                <div class='flex flex-row justify-between inner-brand align-items'>
                    <div class='p-2 flex flex-col'>

                        <h3 class='font-semibold text-xl text-black'>VLABS Basic Health Package for your loved one and you!</h3>

                        <a href="{{route('package-details','75')}}">
                                   
                        <button class="bg-yellow-500 text-white py-2 px-4 rounded-lg shadow-lg mt-4">
                            Check Now!
                        </button>
                        </a>

                    </div>

                    <img src="{{ asset('images/about/feature-brand.png') }}" class='w-[310px]  object-cover' />
                </div>



            </div>
        </div>
    </div>
</section>
