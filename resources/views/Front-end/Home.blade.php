@extends('Front-end.layout.mainlayout')
@section('content')
    @include('Front-end.Components.banner')

    @include('Front-end.Components.organs')

    <section class="features section-sm gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="feature-block d-lg-flex">

                        <div class="feature-item mb-5 mb-lg-0">
                            <div class="feature-icon mb-4">
                                <i class="icofont-surgeon-alt"></i>
                            </div>
                            <span>24 Hours Service</span>
                            <h4 class="mb-3">Online Appoinment</h4>
                            <p class="mb-4">Get All time support for emergency.We have introduced the principle of family
                                medicine.</p>
                            <a href="{{ route('appointment') }}" class="btn btn-main btn-round-full">Make a appoinment</a>
                        </div>

                        <div class="feature-item mb-5 mb-lg-0">
                            <div class="feature-icon mb-4">
                                <i class="icofont-ui-clock"></i>
                            </div>
                            <span>Timing schedule</span>
                            <h4 class="mb-3">Working Hours</h4>
                            <ul class="w-hours list-unstyled">
                                <li class="d-flex justify-content-between">Sun - Wed : <span>8:00 - 17:00</span></li>
                                <li class="d-flex justify-content-between">Thu - Fri : <span>9:00 - 17:00</span></li>
                                <li class="d-flex justify-content-between">Sat - sun : <span>10:00 - 17:00</span></li>
                            </ul>
                        </div>

                        <div class="feature-item mb-5 mb-lg-0">
                            <div class="feature-icon mb-4">
                                <i class="icofont-support"></i>
                            </div>
                            <span>Emegency Cases</span>
                            <h4 class="mb-3">{{ env('PHONE') }}</h4>
                            <p>Get All time support for emergency.We have introduced the principle of family medicine.Get
                                Conneted with us for any urgency .</p>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('Front-end.Components.package')

    <section class="section about gray-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="about-img">
                        <img src="images/about/img-1.jpg" alt="" class="img-fluid">
                        <img src="images/about/img-2.jpg" alt="" class="img-fluid mt-4">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="about-img mt-4 mt-lg-0">
                        <img src="images/about/img-3.jpg" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-content pl-4 mt-4 mt-lg-0">
                        <h2 class="title-color">Personal care <br>& healthy living</h2>
                        <p class="mt-4 mb-5">We provide best leading medicle service Nulla perferendis veniam deleniti ipsum
                            officia dolores repellat laudantium obcaecati neque.</p>

                        <a href="service.html" class="btn btn-main-2 btn-round-full btn-icon">Services<i
                                class="icofont-simple-right ml-3"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section service">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="section-title">
                        <h2>Our Services</h2>
                        <div class="divider mx-auto my-4"></div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-3">
                    <a href="{{ route('appointment') }}">
                        <div class="icon-circle">
                            <img src="images/about/home-workout.png" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Lab Test at Home</h5>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('appointment')}}">
                        <div class="icon-circle">
                            {{-- <i class="fa fa-star"></i> --}}
                            <img src="images/about/physio.png" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Physiotherapist at Home</h5>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('appointment') }}">

                        <div class="icon-circle">
                            {{-- <i class="fa fa-star"></i> --}}
                            <img src="images/about/mri.png" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">MRI, CT SCAN</h5>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('appointment') }}">

                        <div class="icon-circle">
                            {{-- <i class="fa fa-star"></i> --}}
                            <img src="images/about/home-xray.png" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">X-Ray ECG at Home</h5>
                        </div>
                    </a>
                </div>


                 
            </div>
        </div>
    </section>


    @include('Front-end.Components.labs');
@endsection
