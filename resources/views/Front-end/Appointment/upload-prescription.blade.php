@extends('Front-end.layout.mainlayout')
@section('content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Book your Seat</span>
                    <h1 class="text-capitalize mb-5 text-lg">Upload Prescription</h1>

                    <!-- <ul class="list-inline breadcumb-nav">
              <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
              <li class="list-inline-item"><span class="text-white">/</span></li>
              <li class="list-inline-item"><a href="#" class="text-white-50">Book your Seat</a></li>
            </ul> -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="appoinment section">
    <div class="container">
        @include('Front-end.layout.partials.alert')

        <div class="row">
            <div class="col-lg-4">
                <div class="mt-3">
                    <div class="feature-icon mb-3">
                        <i class="icofont-support text-lg"></i>
                    </div>
                    <span class="h3">Call for an Emergency Service!</span>
                    <h2 class="text-color mt-3">+{{env('PHONE')}} </h2>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
                    <h2 class="mb-2 title-color">Home Collection Query Form</h2>
                    <p class="mb-4">Hi there. Don't know which test/package to choose from? Nothing to worry about! Please fill in the details below and someone from our team will call back for home collection confirmation

                        <span style="color:red"> Fields marked with * are mandatory.</span>
                    </p>
                    <form id="#" class="appoinment-form" method="post" enctype="multipart/form-data" action="{{route('prescription.submit')}}">

                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="name" id="name" type="text" class="form-control" placeholder="Full Name*">
                                    @if($errors->has('name'))
                                    <strong style="color:red"> {{ $errors->first('name') }}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone*" maxlength="10">
                                    @if($errors->has('phone'))
                                    <strong style="color:red"> {{ $errors->first('phone') }}</strong>
                                    @endif
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">

                                    <input type="file" name="report" id="report" class="form-control" />

                                </div>
                                @if($errors->has('report'))
                                <strong style="color:red"> {{ $errors->first('report') }}</strong>
                                @endif
                            </div>


                        </div>

                        <button type="submit" class="btn btn-main btn-round-full">Subbmit<i class="icofont-simple-right ml-2"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection