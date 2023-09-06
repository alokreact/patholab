@extends('Front-end.layout.mainlayout')
@section('content')
    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Your Cart</span>
                        <h1 class="text-capitalize mb-5 text-lg">Checkout</h1>

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

<section class="section confirmation">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="confirmation-content text-center">
              <i class="icofont-check-circled text-lg text-color-2"></i>
                <h2 class="mt-3 mb-4">Thank you for your appoinment</h2>
                <p>We will contact with you soon.</p>
            </div>
        </div>
      </div>
    </div>
  </section>

  @endsection