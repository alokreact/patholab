@extends('Front-end.layout.mainlayout')
@section('content')
    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-5 text-lg">My Profile</h1>
                        <span class="text-white">Patient</span>
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

                                <div class="single-blog-item col-md-8 mt-2">
                                    <div class="booking-container">
                                        <p class="booking-date">
                                            Add Patient:
                                        </p>

                                        <div class="booking-box mt-4">

                                            <form id="#" class="appoinment-form" method="post"
                                                enctype="multipart/form-data" action="{{ route('prescription.submit') }}">
                                                @csrf

                                                <div class="booking-details">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="billing-name">Name</label>
                                                                <input type="text" name="patient_name" id="patient_name"
                                                                    class="form-control" placeholder="Enter name">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="billing-email-address">Age</label>
                                                                <input type="number" id="age" class="form-control"
                                                                    name="age" placeholder="Enter age">

                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">

                                                                <label class="form-label" for="billing-phone">Gender</label>
                                                                <select name="gender" id="gender" class="form-control">
                                                                    <option value="1">Male</option>
                                                                    <option value="2">Female</option>
                                                                </select>

                                                            </div>
                                                            @if ($errors->has('gender'))
                                                                <strong style="color:red">
                                                                    {{ $errors->first('gender') }}</strong>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <button type="button" id="add_patient"
                                                        class="btn btn-main btn-round-full">Submit<i
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
