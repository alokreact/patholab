<style>
    .icon-control {
        margin-top: 5px;
        float: right;
        font-size: 80%;
    }

    .btn-light {
        background-color: #fff;
        border-color: #e4e4e4;
    }

    .list-menu {
        list-style: none;
        margin: 0;
        padding-left: 0;
    }

    .list-menu a {
        color: #343a40;
    }

    .card-product-grid .info-wrap {
        overflow: hidden;
        padding: 18px 20px;
    }


    .card-product-grid:hover .btn-overlay {
        opacity: 1;
    }

    .card-product-grid .btn-overlay {
        -webkit-transition: .5s;
        transition: .5s;
        opacity: 0;
        left: 0;
        bottom: 0;
        color: #fff;
        width: 100%;
        padding: 5px 0;
        text-align: center;
        position: absolute;
        background: rgba(0, 0, 0, 0.5);

    }

    .bg-light-subtle {
        max-width: 95%;
        flex-direction: row !important;
        background-color: #696969;
        border: 0;
        box-shadow: 0 7px 7px rgba(0, 0, 0, 0.18);
        /* margin: 0px auto; */
    }

    .card.dark {
        color: #fff;
    }

    .card.card.bg-light-subtle .card-title {
        color: dimgrey;
    }

    .card img {
        max-width: 25%;
        margin: 22px;
        padding: 0.5em;
        border-radius: 0.7em;
    }

    .testcard-body {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .text-section {
        max-width: 55%;
    }

    .text-section h5 {
        color: #00a651 !important;
        font-size: 18px !important;
    }

    .text-section span,
    p {

        font-size: 14px;
        color: #222;
        font-weight: 500;
    }

    .cta-sectionn {
        max-width: 45%;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: space-between;
    }

    .cta-sectionn .btn {
        padding: 0.3em 0.5em;
        /* color: #696969; */
    }

    .card.bg-light-subtle .cta-sectionn .btn {
        background-color: #00a651;
        border-color: #00a651;
    }

    @media screen and (max-width: 475px) {
        .card {
            font-size: 0.9em;
        }
    }
</style>
</style>
@extends('Front-end.layout.mainlayout')
@section('content')
    <section class="page-title bg-1">
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
    </section>

    <section class="section contact-info pb-0">
        <div class="container">
            {{-- <div class="row">
                @include('Front-end.Search.template.sidebar')
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
                <div class="flex md:flex-row flex-col">
                    @include('Front-end.Components.sidebar')
                    <div class="w-full md:w-3/4 p-4">
                        <div class="w-full mb-4 text-xl font-semibold">
                            Showing {{ count($packages) }} results
                        </div>

                        <div class="flex flex-wrap mx-2">
                            @forelse($packages as $package)
                                <div class="w-full md:w-[31%] mb-4 border mx-2">
                                    <div class="border-b-2 rounded w-[260px]  p-1 mx-auto">
                                        <img src="{{ asset('images/bg/' . $package->image) }}" class="" />
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
