@extends('Front-end.layout.mainlayout')
@section('content')
    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-5 text-lg">My Profile</h1>
                        <span class="text-white">Upload Prescription</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .booking-section {
            width: 100%;
        }

        .booking-container {
            gap: 0px;
            display: flex;
            margin-bottom: 10px;
            flex-direction: column;
            justify-content: flex-end;
        }

        .booking-details {
            padding: 30px;
            width: 100%;
        }

        .booking-date {
            padding: 20px 24px;
            font-size: 18px;
            line-height: 21px;
            background: #f5f5f5;
            color: #000;
            font-weight: 600;
        }

        .booking-box {
            border-radius: 15px;
            border: 1px solid #d9d9d9;
        }

        .appoinment-form {
            margin-top: 0px;
        }

        .booking-box_top {
            display: flex;
            justify-content: flex-start;
            padding: 20px 40px;
            border-bottom: 1px solid #f5f5f5;
        }

        .booking-box_top h3 {
            font-size: 18px;
        }

        .bookingCard__family {
            padding: 20px 40px;
            border-bottom: 1px solid #f5f5f5;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .booking-details input {
            height: 55px !important;
            padding: 12px !important;
        }
    </style>

    <section class="section blog-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="booking-section">
                            <div class="row" style="display: flex;justify-content:space-between">
                                @include('Front-end.Profile.sidebar')

                                <div class="single-blog-item col-md-8">
                                    <div class="booking-container">

                                        <p class="booking-date">
                                            Add Address:
                                        </p>

                                        <div class="booking-box">
                                            <form id="#" class="address-form" method="post"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="booking-details">
                                                    <div class="row">

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="billing-city">Name</label>
                                                                <input type="text" class="form-control" id="name"
                                                                    placeholder="Enter City" name="name">

                                                                @if ($errors->has('phone'))
                                                                    <strong style="color:red">
                                                                        {{ $errors->first('phone') }}</strong>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="billing-city">Email</label>
                                                                <input type="text" class="form-control" id="email"
                                                                    placeholder="Enter City" name="email">

                                                                @if ($errors->has('phone'))
                                                                    <strong style="color:red">
                                                                        {{ $errors->first('phone') }}</strong>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="billing-city">Email</label>
                                                                <input type="text" class="form-control" id="email"
                                                                    placeholder="Enter City" name="email">

                                                                @if ($errors->has('phone'))
                                                                    <strong style="color:red">
                                                                        {{ $errors->first('phone') }}</strong>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="billing-address">Address</label>
                                                                <textarea class="form-control" id="address1" rows="3" placeholder="Enter full address" name="address"></textarea>

                                                                @if ($errors->has('name'))
                                                                    <strong style="color:red">
                                                                        {{ $errors->first('name') }}</strong>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="billing-city">City</label>
                                                                <input type="text" class="form-control" id="city"
                                                                    placeholder="Enter City" name="city">
                                                                @if ($errors->has('city'))
                                                                    <strong style="color:red">
                                                                        {{ $errors->first('phone') }}</strong>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">

                                                                <label class="form-label" for="zip-code">State</label>
                                                                <input type="text" class="form-control" id="state"
                                                                    placeholder="Enter Postal code" name="zip">
                                                            </div>
                                                         </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">

                                                                <label class="form-label" for="zip-code">Zip / Postal
                                                                    code</label>
                                                                <input type="text" class="form-control" id="zip"
                                                                    placeholder="Enter Postal code" name="zip">
                                                            </div>
                                                            @if ($errors->has('zip'))
                                                                <strong style="color:red">
                                                                    {{ $errors->first('zip') }}</strong>
                                                            @endif
                                                        </div>



                                                    </div>
                                                    <button type="submit" class="btn btn-main btn-round-full address-btn">Subbmit<i
                                                            class="icofont-simple-right ml-2"></i></button>

                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
