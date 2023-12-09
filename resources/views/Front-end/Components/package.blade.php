{{-- <section class="section doctors">
    <div class="container">
        {{-- <div class="p">
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


         </div> --}}



{{-- <div class="feature-block d-lg-flex">
            <div class="container">
                <div class="row" style="justify-content: space-between">
                    @forelse($packages as $package)
                        <div
                            class="filter-item {{ $package->category }} feature-item col-lg-4 col-md-12 col-sm-12"style="max-width: 31%">

                            <div class="doctor-profile">
                             
                                <h4 class="mb-3 mt-2">{{ strtoupper($package->package_name) }}</h4>

                            
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
        <div class="section-title flex justify-start md:justify-start sm:justify-center">
            <h2 class="font-mediom text-2xl underline">Top Wellness Packages</h2>
        </div>

        <div class="flex justify-between items-center mb-12">
            <div class="flex">
                @forelse($categories as $index=>$category)
                    <div class="flex items-center space-x-1 cursor-pointer mx-2">
                        <div class="flex justify-center p-2 w-[130px] border  text-xs text-black  font-medium rounded-full hover:bg-green-500 
                            hover:text-white category-btn"
                            id="{{ $category->id }}">
                            {{ ucfirst($category->category_name) }}
                        </div>
                    </div>
                @empty
                @endforelse
            </div>



            <div class="space-x-4 lg:mt-0 mt-2">
                <a href="{{ route('category.all') }}">
                    <button
                        class="border border-green-500 w-[120px]  rounded-full p-2 
                        text-black hover:scale-110 hover:bg-green-500 hover:text-white">
                        View All</button></a>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row package">

            @forelse($packages as $package)
                <div class="flex items-center p-0 mt-2 flex-col border">

                    <div class="flex w-[320px] h-[320px] bg-cover justify-center items-center p-0">
                        <a href="{{ route('package-details', $package->id) }}">
                            <img
                                src="{{ asset('images/bg/' . $package->image) }}"class='w-[300px] h-[300px] object-cover'/>
                        </a>
                    </div>

                    <div class="p-1 pb-1 flex flex-col w-full">
                        <h5 class="text-base text-center font-semibold tracking-tight text-gray-900 dark:text-white">
                            {{ $package->package_name }}</h5>
                       
                            <h5 class="text-base text-center font-semibold tracking-tight text-gray-900 dark:text-white">
                                {{ $package->getLab->lab_name }}</h5>
                           
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
                            <h5 class="parameter mt-2 text-xs">
                                {{ $count }} Parameters
                            </h5>

                            <span
                                class="text-base font-bold text-gray-700 dark:text-white">₹{{ $package->price }}/-</span>

                        </div>

                        <div class="flex  justify-between mt-2">
                         
                            <a href="{{ route('package-details', [$package->id]) }}"

                                class="w-[120px] ml-2 text-black border 
                        border-bg-green  font-medium rounded-full text-base 
                        p-2 text-center hover:bg-green-500 hover:text-white">Know
                                More
                            </a>
                        </div>

                    </div>

                </div>

            @empty

            @endforelse
        </div>
    </div>
</section>
