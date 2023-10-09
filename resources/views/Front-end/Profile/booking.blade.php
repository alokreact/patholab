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
        .booking-section {
            width: 100%;
        }
        .booking-container {
            gap: 20px;
            display: flex;
            margin-bottom: 20px;
            flex-direction: column;
            justify-content: flex-end;
        }

        .booking-date {
            padding: 20px 24px;
            font-size: 14px;
            line-height: 21px;
            background: #f5f5f5;
            display: flex;
            justify-content: space-between;
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
                        <div class="booking-section">     
                            <div class="row" style="display: flex;justify-content:space-between">
                                @include('Front-end.Profile.sidebar')

                                    <div class="single-blog-item col-md-8">
                                        @foreach ($order_items as $items)
                                        <div class="booking-container">
                                            <p class="booking-date">
                                                Order Date: {{ date('d-m-Y',strtotime($items->created_at)) }}
                                               
                                               <span> Status : Pending</span>
                                            
                                            </p>

                                       
                                            <div class="booking-box">
                                                <div class="booking-box_top">
                                                    <h3>Booking ID: <span>{{ $items->recieptId }}</span></h3>
                                                </div>

                                                <div class="booking_collectionDetails">
                                                    <h3>Collection date &amp; time</h3>
                                                    <div class="collectionDetails_info">
                                                        <div class="collectionDetails_info_dateTime">
                                                            <p>{{date('d-m-Y', strtotime($items->order_date)) }}<sup></sup>
                                                                | {{ $items->collection_time }}</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="bookingCard__family">
                                                    <div class="bookingCard__family__member">
                                                        <ul>
                                                            @foreach ($items->OrderItems()->where('order_id', $items->id)->get() as $items)
                                                                @foreach ($items->subtest()->where('id', $items->product_id)->get() as $subtests)
                                                                    <li>{{ $subtests->sub_test_name }}</li>
                                                                @endforeach
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="bookingCard__buttons">
                                                    <button class="btn btn-main-2 btn-full-round" type="button">Download Reports</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
