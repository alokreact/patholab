@extends('Front-end.layout.mainlayout')
@section('content')
    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-5 text-lg">My Profile</h1>
                        <span class="text-white">Address</span>
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
            justify-content: space-between;
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

        .bookingCard__buttons {
            display: flex;
            justify-content: end;
            margin: 8px;
            padding: 3px;
        }

        .booking_collectionDetails {
            margin: 5px;
        }

        .collectionDetails_info {
            display: flex;
            letter-spacing: 3px;
            font-size: 16px;
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
                                            Address:
                                        </p>


                                        <div class="booking-box">
                                            <form class="address-edit-form"
                                                action="{{route('address.update',[$address->id]) }}" method="post"
                                                enctype="multipart/form-data">
                                                
                                                @csrf
                                                @method('put')

                                                <div class="booking-details">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="billing-city">Name</label>
                                                                <input type="text" class="form-control" id="name"
                                                                    placeholder="Enter Name" name="name"
                                                                    value="{{ $address->name }}">
                                                                @if ($errors->has('name'))
                                                                    <strong style="color:red">
                                                                        {{ $errors->first('name') }}</strong>
                                                                @endif
                                                                <span class="error_name" style="color:red"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="billing-city">Email</label>
                                                                <input type="text" class="form-control" id="email"
                                                                    placeholder="Enter Email" name="email"
                                                                    value="{{ $address->email }}">

                                                                @if ($errors->has('email'))
                                                                    <strong style="color:red">
                                                                        {{ $errors->first('email') }}</strong>
                                                                @endif
                                                                <span class="error_email" style="color:red"></span>

                                                            </div>
                                                        </div>


                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="billing-address">Street
                                                                    Address</label>
                                                                <textarea class="form-control" id="address1" rows="4" placeholder="Enter full address" name="address1">{{ $address->address1 }}</textarea>

                                                                @if ($errors->has('address1'))
                                                                    <strong style="color:red">
                                                                        {{ $errors->first('address1') }}</strong>
                                                                @endif
                                                                <span class="error_address1" style="color:red"></span>

                                                            </div>
                                                        </div>


                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="billing-city">Phone</label>
                                                                <input type="text" class="form-control" id="phone"
                                                                    placeholder="Enter Phone" name="phone"
                                                                    value="{{ $address->phone }}">

                                                                @if ($errors->has('phone'))
                                                                    <strong style="color:red">
                                                                        {{ $errors->first('phone') }}</strong>
                                                                @endif

                                                                <span class="error_phone" style="color:red"></span>

                                                            </div>
                                                        </div>


                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="billing-city">City</label>
                                                                <input type="text" class="form-control" id="city"
                                                                    placeholder="Enter City" name="city"
                                                                    value="{{ $address->city }}">
                                                                @if ($errors->has('city'))
                                                                    <strong style="color:red">
                                                                        {{ $errors->first('city') }}</strong>
                                                                @endif
                                                                <span class="error_city" style="color:red"></span>

                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">

                                                                <label class="form-label" for="zip-code">State</label>
                                                                <input type="text" class="form-control" id="state"
                                                                    placeholder="Enter State" name="state"
                                                                    value="{{ $address->state }}">

                                                                @if ($errors->has('state'))
                                                                    <strong style="color:red">
                                                                        {{ $errors->first('state') }}</strong>
                                                                @endif

                                                                <span class="error_state" style="color:red"></span>

                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">

                                                                <label class="form-label" for="zip-code">Zip / Postal
                                                                    code</label>
                                                                <input type="text" class="form-control" id="zip"
                                                                    placeholder="Enter Postal code" name="zip"
                                                                    value="{{ $address->zip }}">

                                                            </div>
                                                            @if ($errors->has('zip'))
                                                                <strong style="color:red">
                                                                    {{ $errors->first('zip') }}</strong>
                                                            @endif

                                                            <span class="error_zip" style="color:red"></span>

                                                        </div>
                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-main btn-round-full">Update<i
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
