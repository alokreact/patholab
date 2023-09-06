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


                </div>
            </div>
        </div>
    </div>
</section>

<section class="appoinment section">
    <div class="container">
        <div class="row">

            <div class="col-lg-10">
                <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
                    <h2 class="mb-2 title-color">Select Pay Option</h2>


                    <div class="container mt-3 mx-auto">

                        <form method="post" action="{{route('save_pay_option')}}">

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pay_option"  value="1">
                                <label class="form-check-label" for="exampleRadios1">
                                    PAY ONLINE
                                </label>
                            </div>
                            @csrf

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pay_option"  value="2" checked>
                                <label class="form-check-label" for="exampleRadios2">
                                    PAY COD
                                </label>
                            </div>

                            <div class="btn-save mt-4">

                                <input type="submit" class="btn btn-primary" value="Save & Next" />

                            </div>

                        </form>



                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection