<section class="section doctors">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Top Wellness Packages</h2>
                    <div class="divider mx-auto my-4"></div>
                </div>
            </div>
        </div>

        <div class="package-header">
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
            <a href="{{ route('category.all')}}">
             <button class="btn btn-main-2 btn-round-full" style="cursor:pointer">View All</button></a>

            
        </div>
        </div>
       
        {{-- <div class="feature-icon mb-4">
    <img class="card-img-top mt-0" src="{{ asset('Image/' . $package->getLab->image) }}"
        alt="{{ $package->getLab->lab_name }}">
</div> --}}

        <div class="feature-block d-lg-flex">
            <div class="container">
                <div class="row package" style="justify-content: space-between">
                    @forelse($packages as $package)
                        <div
                            class="filter-item {{ $package->category }} feature-item col-lg-4 col-md-12 col-sm-12"style="max-width: 31%">

                            <div class="doctor-profile">
                                <div class="doctor-img">
                                    <img src="{{ $package->image? asset('images/bg/'. $package->image): asset('images/team/2.jpg') }}" alt="doctor-image"
                                        class="img-fluid w-100">
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
</section>
