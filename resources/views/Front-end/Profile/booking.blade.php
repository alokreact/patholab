@extends('Front-end.layout.mainlayout')
@section('content')
    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-5 text-lg">My Profile</h1>
                        <span class="text-white">Order Overview</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <style>
        .booking-container {
            gap: 20px;
            display: flex;
            margin-bottom: 20px;
            flex-direction: column;
        }

        .booking-date {
            padding: 20px 24px;
            font-size: 14px;
            line-height: 21px;
            background: #f5f5f5;
        }

        .booking-box {
            border-radius: 15px;
            border: 1px solid #d9d9d9;
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

        .booking_collectionDetails {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 20px 40px;
            border-bottom: 1px solid #f5f5f5;
        }

        .bookingCard__family__member h2 {
            font-size: 16px;
        }

        .bookingCard__family__member ul li {
            color: red;
        }

        .bookingCard__buttons {

            background: linear-gradient(223.23deg, hsla(0, 0%, 100%, .5) -39.74%, hsla(10, 71%, 92%, .5) 94.44%);
            padding: 20px 40px;
            display: flex;
            justify-content: flex-end;

        }
    </style>
    <section class="section blog-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <div class="row">

                                @include('Front-end.Profile.sidebar')

                                <div class="single-blog-item col-md-7">
                                    <div class="booking-container">
                                        <p class="booking-date"> 12 August 1997</p>
                                        <div class="booking-box">
                                            <div class="booking-box_top">
                                                <h3>Booking ID: <span>5086842</span></h3>
                                            </div>

                                            <div class="booking_collectionDetails">
                                                <h3>Collection date &amp; time</h3>
                                                <div class="collectionDetails_info">
                                                    <div class="collectionDetails_info_dateTime">
                                                        <p>16<sup>th</sup> Aug'23 | 06:00 AM - 07:00 AM</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="bookingCard__family">
                                                <div class="bookingCard__family__member">
                                                    <h2>Test | 23 | Male</h2>
                                                    <ul>
                                                        <li>Fit India Full Body checkup with Vitamin Screening</li>
                                                        <li>Complete Blood Count (CBC) Test</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="bookingCard__buttons">
                                                <button class="btn btn-main-2 btn-full-round" type="button">Download
                                                    Reports</button>
                                            </div>

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
