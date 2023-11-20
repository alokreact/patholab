@extends('Front-end.layout.mainlayout')
@section('content')
    <div id="loader"
        class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex justify-center items-center z-50 hidden">
        <div class="loader ease-linear rounded-full border-8 border-t-8 border-gray-200 h-12 w-12"></div>
    </div>

    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-5 text-lg">Sign Up</h1>
                        <span class="text-white">Get access to your orders, lab tests & consultations</span>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="conatiner">
        <div class="flex flex-col lg:w-[32%] md:w-full p-4 shadow-lg mx-auto mt-4">

            <div class="mt-2 border p-4">
                <h4 class="text-xl text-green font-semibold text-center">Register</h4>
            </div>

            <div class="lg:w-full md:w-full p-4">
                <form id="#" class="appoinment-form" method="post" action="{{ route('signup') }}"
                    autocomplete="off">
                    @csrf
                    <div class="flex mb-4">
                        <div class="w-full mr-4">
                            <label for="name">Name:</label>

                            <input name="name" id="name" type="text" class="form-control" placeholder="Name"
                                autocomplete="off">

                            <span class="error_name" style="color:red"></span>


                            @if ($errors->has('name'))
                                <strong style="color:red"> {{ $errors->first('name') }}</strong>
                            @endif
                        </div>
                    </div>

                    <div class="flex mt-4">
                        <div class="w-full mr-4">

                            <label for="name">Email:</label>

                            <input name="email" id="email" type="email" class="form-control" placeholder="Email"
                                autocomplete="off">

                            <span class="error_email" style="color:red"></span>

                            @if ($errors->has('email'))
                                <strong style="color:red"> {{ $errors->first('email') }}</strong>
                            @endif

                        </div>
                    </div>

                    <div class="flex mb-4 mt-3">
                        <div class="w-full mr-4">
                            <label for="name">Phone:</label>

                            <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone"
                                maxlength="10" autocomplete="off">

                            <span class="error_phone" style="color:red"></span>

                            @if ($errors->has('phone'))
                                <strong style="color:red"> {{ $errors->first('phone') }}</strong>
                            @endif

                        </div>
                    </div>

                    <div class="flex justify-between mt-4">
                        <div class="w-full mr-4">

                            <input type="checkbox" name="check" class="mr-2" />
                            <span>Are you agree to Terms of Condition and Privacy Policy.</span>
                        </div>
                    </div>


                    <div class="flex mt-4">
                        <div class="w-full mr-4 flex flex-around">
                            <button
                                class="border w-full p-3 border-green-500 text-base 
                      text-black hover:bg-green-400 hover:text-white focus:outline-none register_btn"
                                type="button">
                                Register
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('register_js')
    <script>
        $('.register_btn').on('click', function(e) {
            e.preventDefault;
            console.log('>>>working')

            var email = $('#email').val();
            var name = $('#name').val();
            var phone = $('#phone').val();
            var valid = true;

            var iconUrl = '<i class="icofont-spinner-alt-6 text-2xl text-black" style="padding:2px"></i>';

            if (name === '') {
                $('.error_name').html('<i class=\"icofont-info-circle\"></i> &nbsp;Name is required.');
                valid = false;
            } else {
                $('.error_name').html('');
            }

            if (email === '') {
                $('.error_email').html('<i class=\"icofont-info-circle\"></i> &nbsp;Email is required.');
                valid = false;
            } else {
                $('.error_email').html('');
            }
            if (phone === '') {
                $('.error_phone').html('<i class=\"icofont-info-circle\"></i> &nbsp;Phone is required.');
                valid = false;
            }

            if (phone) {
                if (!$.isNumeric(phone)) {
                    $('.error_phone').html('<i class=\"icofont-info-circle\"></i> &nbsp;Phone should be numeric.');
                    valid = false;
                } else if (phone.trim().length > 10 || phone.trim().length < 10) {
                    $('.error_phone').html(
                        '<i class=\"icofont-info-circle\"></i> &nbsp;Phone should be at least 10 digits.');
                    valid = false;
                } else {
                    $('.error_phone').html('');
                }
            }

            if (name !== '' && phone !== '' && email !== '') {
                valid = true;
                console.log('>>>', APP_URL)
            }

            if (valid) {

                $('#loader').removeClass('hidden');

                $.ajax({
                    'url': APP_URL + '/signup',
                    'method': 'POST',
                    'data': {
                        'name': name,
                        'email': email,
                        'phone': phone
                    },
                    success: function(response, textStatus, xhr) {
                        if (xhr.status === 201) {

                            $('#loader').addClass('hidden');

                            Swal.fire({
                                icon: 'success',
                                //title: 'Login Error',
                                html: response.message,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = APP_URL + response.redirectTo;
                                }
                            })
                        } else {
                            console.log('eerrr')
                            Swal.fire({
                                icon: 'error',
                                html: response.message,
                            })
                        }
                    }

                })
            }
        });
    </script>
@endsection
