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

<section class="appoinment section">
    <div class="container">
        <div class="row">



            <div class="col-lg-10">
                <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
                    <h2 class="mb-2 title-color">Checkout</h2>


                    <div class="container mt-1">
                        <div class="card mx-auto border-0" style="width: 100%;">
                            <div class="card-header border-bottom-0 bg-transparent">
                                <ul class="nav nav-tabs justify-content-start pt-4" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active text-primary" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Details</a>

                                    <li class="nav-item">
                                        <a class="nav-link text-primary disabled" id="pills-register-tab" data-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Address</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body pb-4">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                                        <form id="appoinment-form" class="appoinment-form" method="post" action="{{route('razorpay.payment.store')}}">
                                            @csrf
                                            <div class="form-group">
                                                <input name="name" id="name" type="text" class="form-control" placeholder="Full Name">
                                                <span class="error error_name"></span>
                                            </div>

                                            <div class="form-group">
                                                <input name="email" id="email" type="text" class="form-control" placeholder="Email">
                                                <span class="error error_email"></span>
                                            </div>
                                            <div class="form-group">


                                                <input name="date" id="date" type="date" class="form-control" placeholder="dd/mm/yyyy">
                                                <span class="error error_date"></span>
                                            </div>

                                            <div class="form-group">

                                                <?php
                                                function hoursRange($lower = 8, $upper = 21, $step = 0.25, $format = null)
                                                {
                                                    if ($format === null) {
                                                        $format = 'g:ia'; // 9:30pm
                                                    }
                                                    $times = [];
                                                    foreach (range($lower, $upper, $step) as $increment) {
                                                        $increment = number_format($increment, 2);
                                                        [$hour, $minutes] = explode('.', $increment);
                                                        $date = new DateTime($hour . ':' . $minutes * 0.6);
                                                        $times[(string) $increment] = $date->format($format);
                                                    }
                                                    return $times;
                                                }

                                                $currentHour = 9;
                                                $array = $timeArr = hoursRange();
                                                //$array = array_values($timeArr);
                                                echo "<select class='form-control' name='time' id='time'>";
                                                echo "<option value=''>--Select--</option>";
                                                $i = 0;
                                                foreach ($array as $key => $value) {
                                                    $newArr = explode('.', $key);
                                                    if ($newArr[0] == $currentHour || $newArr[0] < $currentHour) {
                                                        $disabled = 'disabled = disabled';
                                                    } else {
                                                        $disabled = '';
                                                    }
                                                    //$disabled = '';
                                                    echo '<option value=' . $i . " $disabled>" . $value . '</option>';
                                                    $i++;
                                                }
                                                echo '</select>';
                                                ?>

                                                <span class="error error_time"></span>
                                            </div>

                                            <div class="form-group">
                                                <input name="phone" id="phone" type="Number" class="form-control" placeholder="Phone Number">

                                                <span class="error error_phone"></span>
                                            </div>

                                            <!-- <div class="form-group">


                                                <label for="pay">Pay Option</label>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pay_option" id="flexRadioDefault1" value="2">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            COD
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pay_option" id="flexRadioDefault2" value="1">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Online
                                                        </label>
                                                    </div>
                                                </div>

                                                <span class="error error_pay_option"></span>
                                            </div> -->




                                            <div class="text-right pt-4">
                                                <button type="button" class="btn btn-primary" id="details_btn">Save & Next</button>
                                            </div>

                                    </div>

                                    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
                                        <div class="form-group">
                                            <input name="address1" id="address1" type="text" class="form-control" placeholder="Address1">

                                            <span class="error_ad error_address1"></span>
                                        </div>

                                        <div class="form-group">
                                            <input name="state" id="state" type="text" class="form-control" placeholder="State">
                                            <span class="error_ad error_state"></span>
                                        </div>

                                        <div class="form-group">
                                            <input name="city" id="city" type="text" class="form-control" placeholder="City">
                                            <span class="error_ad error_city"></span>
                                        </div>

                                        <div class="form-group">
                                            <input name="zip" id="zip" type="text" class="form-control" placeholder="Zip">
                                            <span class="error_ad error_zip"></span>
                                        </div>
                                        <div class="form-group">


                                            <input name="country" id="country" type="text" class="form-control" placeholder="Country">
                                            <span class="error_ad error_country"></span>
                                        </div>


                                        <div class="text-right pt-2 pb-1">
                                            <button type="button" class="btn btn-primary" id="pay">Save</button>
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
    </div>
</section>
@endsection

@section('page_specific_js')
<script>
    var valid = true;

    $('#details_btn').on('click', function(e) {
        e.preventDefault();
        if ($('#name').val().length < 1) {
            $('.error_name').html('<i class=\"icofont-info-circle\"></i> &nbsp;Name is required.');
            valid = false;
        }
        if ($('#email').val().length < 1) {
            $('.error_email').html('<i class=\"icofont-info-circle\"></i> &nbsp;Email is required.');
            valid = false;
        }
        if ($('#date').val().length < 1) {
            $('.error_date').html('<i class=\"icofont-info-circle\"></i> &nbsp;Select Dates.');
            valid = false;
        }
        if ($('#time').val().length < 1) {
            $('.error_time').html('<i class=\"icofont-info-circle\"></i> &nbsp;Select Time.');
            valid = false;
        }
        if ($('#phone').val().length < 1) {
            $('.error_phone').html('<i class=\"icofont-info-circle\"></i> &nbsp;Phone is required.');
            valid = false;
        } else {
            valid = true;
        }
        if (valid) {
            $('.error').hide();

            $("#address").show();
            $('#pills-register-tab').removeClass('disabled');
            $('#pills-register-tab').click();
        }
    });

    $('#pay').on('click', function(e) {
        var valid = true;
        console.log('save');

        e.preventDefault();
        if ($('#address1').val().length < 1) {

            $('.error_address1').html('<i class=\"icofont-info-circle\"></i> &nbsp;This field is required.');
            valid = false;

        }
        if ($('#state').val().length < 1) {
            $('.error_state').html('<i class=\"icofont-info-circle\"></i> &nbsp;This field is required.');
            valid = false;
        }
        if ($('#city').val().length < 1) {
            $('.error_city').html('<i class=\"icofont-info-circle\"></i> &nbsp;This field is required.');
            valid = false;
        }
        if ($('#zip').val().length < 1) {
            $('.error_zip').html('<i class=\"icofont-info-circle\"></i> &nbsp;This field is required.');
            valid = false;

        }
        if ($('#country').val().length < 1) {
            $('.error_country').html('<i class=\"icofont-info-circle\"></i> &nbsp;This field is required.');
            valid = false;
        } else {
            valid = true;
        }
        if(valid) {
            console.log('>>working')
            $('#appoinment-form').submit();
        }
    })
</script>
@endsection