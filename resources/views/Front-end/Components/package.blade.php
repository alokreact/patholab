{{-- <section class="section doctors">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Top Wellness Packages</h2>
                    <div class="divider mx-auto my-4"></div>
                </div>
            </div>
        </div>

        {{-- <div class="package-header">
            <div class="text-center mb-5">
                <div class="btn-group btn-group-toggle " data-toggle="buttons">
                    <div class="package-name">
                        <ul>
                            <li>
                                <label class="btn active">
                                    <button id="btn-all" class="btn-all">All</button>
                                </label>
                            </li>
                            @forelse($categories as $category)
                                <li>
                                    <label class="btn ">
                                        <button id="{{ $category->id }}" class="category-btn">
                                            {{ ucfirst($category->category_name) }}</button>
                                    </label>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>


            <div class="all mt-2">
                <a href="{{ route('category.all') }}">
                    <button class="btn btn-main-2 btn-round-full" style="cursor:pointer">View All</button></a>


            </div>
        </div> --}}



{{-- <div class="feature-block d-lg-flex">
            <div class="container">
                <div class="row package" style="justify-content: space-between">
                    @forelse($packages as $package)
                        <div
                            class="filter-item {{ $package->category }} feature-item col-lg-4 col-md-12 col-sm-12"style="max-width: 31%">

                            <div class="doctor-profile">
                                <div class="doctor-img">
                                    <img src="{{ $package->image ? asset('images/bg/' . $package->image) : asset('images/team/2.jpg') }}"
                                        alt="doctor-image" class="img-fluid w-100">
                                </div>

                                <h4 class="mb-3 mt-2">{{ strtoupper($package->package_name) }}</h4>

                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($package->grouptest as $grouptest)
                                    @php
                                        $value = category_count($grouptest->pivot->parent_test_id);
                                        $count += $value;
                                    @endphp
                                @endforeach
                                <h5 class="parameter mt-2">
                                    {{ $count }} Parameters

                                </h5>

                            </div>


                            <div class="rates boxes ">
                                <del>₹<span class="_test_mrp">{{ $package->price * 2 }}/-</span></del>

                                <div class="blue">₹<span class="_test_selling">{{ $package->price }}/-</span> </div>
                                <div class="sm">50% discount </div>

                            </div>

                            <div class="call-btn">
                                <h5>{{ $package->getLab->lab_name }}</h5>

                                <a href="{{ route('package-details', [$package->id]) }}"
                                    class="btn btn-main btn-round-full"> Book Now</a>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section> --}}


<section class="section doctors">
    <div class="container">
        <div class="flex justify-between items-center">
            <div class="section-title">
                <h2 class="font-mediom text-2xl underline">Top Wellness Packages</h2>
            </div>

            <div class="flex category-header">
                @forelse($categories as $index=>$category)
                    <div class="flex items-center space-x-1 cursor-pointer mx-2" id="{{ $category->id }}">
                        <div
                            class="border text-green  text-2l  font-medium p-3 rounded-full hover:bg-green-500 hover:text-white">
                            {{$category->category_name }}
                        </div>
                    </div>
                @empty
                @endforelse
            </div>


            <div class="space-x-4 lg:mt-0 mt-2">
                <a href="{{ route('category.all') }}">
                    <button
                    class="border border-green-500 w-[120px]  rounded-full p-2 text-black hover:scale-110 hover:bg-green-500 hover:text-white">View
                    All</button></a>
            </div>
        </div>
    </div>

    <div class="container mx-auto">
        <div class="flex">
            <div class="w-full md:w-2/3 flex justify-between flex-wrap package">
                @forelse($packages as $package)
                    <div class="w-full md:w-1/3 p-4">
                        <div
                            class="w-full  max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mr-4 hover:scale-105 tranistion-transform rounded-lg">
                            <a href="#">
                                <img class="p-2 rounded-t-lg"
                                    src="{{ $package->image? asset('images/bg/'.$package->image) : asset('images/team/2.jpg') }}"
                                    alt="product image" />
                            </a>

                            <div class="p-2 pb-1">
                                <a href="#">
                                    <h5
                                        class="text-base text-center font-semibold tracking-tight text-gray-900 dark:text-white">
                                        {{ $package->package_name }}</h5>
                                </a>
                                @php
                                    $count = 0;
                                @endphp

                                @foreach ($package->grouptest as $grouptest)
                                    @php
                                        $value = category_count($grouptest->pivot->parent_test_id);
                                        $count += $value;
                                    @endphp
                                @endforeach

                                <div class="flex items-center justify-between mt-2">

                                    <h5 class="parameter mt-2 text-base">
                                        {{ $count }} Parameters

                                    </h5>

                                    <h6 class="mt-2 text-base font-bold">{{ $package->getLab->lab_name }}</h6>

                                </div>

                                <div class="flex  justify-between mt-2">
                                    <span
                                        class="text-base font-bold text-gray-700 dark:text-white">₹{{ $package->price }}/-</span>

                                    <a href="{{route('package-details',[$package->id])}}"
                                        class="w-[140px] ml-4 text-black border 
                                border-bg-green  font-medium rounded-full text-base 
                                p-2 text-center hover:bg-green-500 hover:text-white">Know More
                                        </a>

                                </div>


                            </div>
                        </div>
                    </div>
                @empty

                @endforelse
            </div>


            <div class="w-1/3 px-16">

                <div class="rounded p-8">

                    <div class="flex border flex-col" style="background-color: #f7e99e">

                            <div class="flex justify-center">

                                    <img src="{{asset('Image/202309191851kidney.png')}}" class="w-[245px]"/>
                            </div>

                            <div class="btn view-more flex flex-col mt-2">
                              
                                <p class="text-basic text-black text-xs mt-1 p-2 line-height-26">  
                                    Offer - Upto 30% OFF on single package & upto 40% OFF on 
                                    double packages</p>
                                <h4 class="text-xl text-black mt-1 p-2"> Only For -  599/-</h4>

                                <button class="border bg-yellow-500 border-yellow-400 p-2 text-black text-xl mt-1 bg-red-500 hover:text-white">
                                    Check Now
                                </button>

                            </div>

                    </div>

                    {{-- <img src="{{ asset('images/about/PBanner.png') }}" alt="Ad Banner" class="w-full h-auto" /> --}}
                </div>
                {{-- <div class="rounded p-8">
                <img src="{{asset('images/about/Banner.png')}}" alt="Ad Banner" class="w-full h-auto" />
            </div> --}}

            </div>
        </div>
    </div>
</section>
