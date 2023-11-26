 
@extends('Front-end.layout.mainlayout')
@section('content')

    {{-- <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white"></span>
                        <h1 class="text-capitalize mb-5 text-lg">Package for {{ $category['category_name'] }}</h1>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="section contact-info pb-0">
        <div class="container">
            {{-- <div class="row">
                <main class="col-md-9">
                    @forelse($packages as $package) --}}
            {{-- <div class="col-lg-4 col-sm-6 col-md-6" style="margin-bottom:3px">
                        <div class="contact-block mb-4 mb-lg-0">
                            <img src="{{asset('Image/'.$package->getLab->image)}}"  class="img-fluid"
                                style="height:90px; width:180px">

                            <h5 class="card-title mt-3">{{ ucfirst($package->package_name) }}</h5>

                            <h5 class="card-title mt-3">Price - ₹{{ ucfirst($package->price) }}/-</h5>

                            <h5 class="card-title" style="text-align: center;font-size:12px; color:brown">Include
                                     Tests-

                                     @php 
                                        $count = 0;
                                     @endphp
                                    
                                     @foreach ($package->grouptest as $grouptest) 
                                         
                                     @php
                                         $value = category_count($grouptest->pivot->parent_test_id);
                                         
                                         $count += $value;
                                              
                                         
                                       @endphp    

                                     @endforeach

                                     {{$count }}</h5>

                                 
                            <ul class="list-group list-group-flush">
                                <?php //$i = 0;
                                ?>
                                @foreach ($package->grouptest as $grouptest)
                                    <?php ?>
                                    <li class="list-group-item">{{ucfirst($grouptest->name) }}</li>

                                    <?php //if ($i >= 2) {
                                    //break;
                                    //}
                                    //$i++;
                                    ?>
                                @endforeach
                            </ul>
                            <div class="card-body">
                                <a href="{{ route('package-details', [$package->id]) }}"
                                    class="card-link btn btn-success">View  +</a>
                            </div>
                        </div>
                    </div> --}}
            {{-- 
                        <div class="card bg-light-subtle mt-4">
                            <img src="{{ asset('Image/' . $package->getLab->image) }}">
                            <div class="testcard-body">
                                <div class="text-section">

                                    <h5 class="fw-bold" style="font-size: 14px">
                                        {{ ucfirst($package->package_name) }}</h5>

                                    @php
                                        $count = 0;
                                    @endphp
                                    @foreach ($package->grouptest as $grouptest)
                                        @php
                                            $value = category_count($grouptest->pivot->parent_test_id);
                                            $count += $value;
                                        @endphp
                                    @endforeach
                                    <span class="parameter mt-4">
                                        {{ $count }} Parameters

                                    </span>

                                    <p class="card-text mt-2">{{ ucfirst($package->getlab->lab_name) }}</p>

                                    <span><i class="icofont-google-map" style="font-size:16px;color:#000"></i>
                                        {{ ucfirst($package->getlab->city) }}</span>


                                </div>

                                <div class="cta-sectionn">

                                    <div class="rates boxes " style="margin-left: 50px; width:100%">
                                        <del>₹<span class="_test_mrp">{{ $package->price * 2 }}/-</span></del>

                                        <div class="blue">₹<span class="_test_selling">{{ $package->price }}/-</span>
                                        </div>
                                        <div class="sm">50% discount </div>

                                    </div>


                                    <a href="{{ route('package-details', [$package->id]) }}" class="btn btn-main-2">
                                        VIEW +
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No Records</p>
                    @endforelse
                </main>
            </div> --}}



            <div class="container mx-auto">

                <nav class="flex  mb-2 mt-0" aria-label="Breadcrumb">
                    <span class="text-gray-500 text-xs mx-2"><i class="icofont-home"></i>Home</span>
                    <span class="mx-2 text-xs"> <i class="icofont-rounded-right"></i> </span>
                    <a href="#" class="text-black-500 text-xs font-semibold hover:underline mx-2">Packages</a>
                    
                    <span class="mx-2 text-xs"> <i class="icofont-rounded-right"></i> </span>
                    <a href="#" class="text-black-500 text-xs font-semibold hover:underline mx-2">  {{ $category['category_name'] }}</a>
                    
                  
                </nav>
           
                <div class="flex md:flex-row flex-col">
                    @include('Front-end.Components.sidebar')
                    <div class="w-full md:w-3/4 p-4">
                        <div class="w-full mb-4 text-xs font-semibold">
                            Showing {{ count($packages) }} results
                        </div>

                        <div class="flex flex-wrap mx-2">
                            @forelse($packages as $package)
                                <div class="w-full md:w-[31%] mb-4 border mx-2">
                                    <div class="border-b-2 rounded w-full p-1 mx-auto">
                                        <a href="{{ route('package-details', [$package->id]) }}">
                                    
                                            <img src="{{ asset('images/bg/'.$package->image) }}" class="" />
                                        </a>
                                    </div>

                                    <div class="p-4 mt-1 items-center flex justify-center">
                                        <h6 class="text-black text-basic font-semibold mb-2">
                                            {{ ucfirst($package->package_name) }}
                                        </h6>
                                    </div>
                                    <div class="p-1 mt-1 items-center flex justify-between">

                                        <h6 class="text-black text-xs font-semibold mb-2">
                                            <i class="icofont-google-map" style="font-size:16px;color:#000">
                                            </i>
                                            {{ ucfirst($package->getlab->city) }}
                                        </h6>
                                        <h6 class="text-black text-xs font-semibold mb-2">

                                            {{ $package->getLab->lab_name }}
                                        </h6>
                                    </div>
                                    <div
                                        class="p-3 mt-1 mb-1 items-center bg-gray-100 flex 
                                        justify-between my-1 mx-1 rounded-full text-black">
                                        <del>₹<span>{{ $package->price * 2 }}/-</span></del>
                                        <span> ₹{{ $package->price }}/-</span>

                                        <div class="sm">50% discount </div>
                                    </div>

                                    <div class="btn-view flex justify-end m-1">
                                        <a href="{{ route('package-details', [$package->id]) }}"
                                            class="border border-green-500 rounded-full p-2 hover:text-white hover:bg-green-400">Know
                                            More</a>
                                    </div>
                                </div>

                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
