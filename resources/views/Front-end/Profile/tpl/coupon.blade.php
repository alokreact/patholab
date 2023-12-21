@extends('Front-end.layout.mainlayout')
@section('content')
    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-5 text-lg">My Referal</h1>
                        <span class="text-white"></span>
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
                                            My Coupon:
                                        </p>

                                        <div class="booking-box">

                                                 <div class="booking-details">
                                                    <div class="row">

                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                @forelse($coupon as $element)
                                                                        <h2>{{$element->name}}</h2><br/>

                                                                @empty
                                                                <h2>No Active Coupon Yet!</h2><br/>
        
                                                                @endforelse
                                                                
                                                                    <h6>Get flat 10% cashback by sharing it to others.</h6>
                                                             
                                                                        <br/>
                                                                        <span>Expiry Date:  30 December 2023</span>
                                                             
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
                </div>
            </div>
        </div>
    </section>
@endsection
