@extends('Front-end.layout.mainlayout')
@section('content')
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

{{-- <section class="appoinment section">
  <div class="side-overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <div class="mt-3">
          <div class="feature-icon mb-3">
            <i class="icofont-support text-lg"></i>
          </div>
          <span class="h3">Call for an Emergency Service!</span>
          <h2 class="text-color mt-3">+{{env('PHONE')}} </h2>
        </div>
        <img src="{{asset('images/bg/book-test.png')}}"  class="img-responsive" style="max-width: 100%"/>
      
      </div>

      <div class="col-lg-7">
        <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
          <h2 class="mb-2 title-color">Sign Up</h2>
          <p class="mb-4">Get medicine information, order medicines, book lab tests and consult online from the comfort of your home.</p>
          <form id="#" class="appoinment-form" method="post" action="{{route('signup')}}" autocomplete="off">
            @csrf
            <div class="row">

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="name">First Name:</label>
                  <input name="name" id="name" type="text" class="form-control" placeholder="Name" autocomplete="off">

                  @if($errors->has('name'))
                  <strong style="color:red"> {{ $errors->first('name') }}</strong>
                  @endif
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="name">Email:</label>

                  <input name="email" id="email" type="email" class="form-control" placeholder="Email" autocomplete="off">

                  @if($errors->has('email'))
                  <strong style="color:red"> {{ $errors->first('email') }}</strong>
                  @endif

                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="name">Phone:</label>

                  <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone" maxlength="10" autocomplete="off">

                  @if($errors->has('phone'))
                  <strong style="color:red"> {{ $errors->first('phone') }}</strong>
                  @endif
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="name">Password:</label>

                  <input name="password" id="password" type="password" class="form-control" placeholder="Password" maxlength="15" autocomplete="off">

                  @if($errors->has('password'))
                  <strong style="color:red"> {{ $errors->first('password') }}</strong>
                  @endif

                </div>
              </div>

            </div>

            <button type="submit" class="btn btn-main btn-round-full">Register<i class="icofont-simple-right ml-2"></i></button>
          </form>
        </div>

        <p style="margin: 40px">Have an account? <a href="{{route('signin')}}" style="color:coral;font-weight:700"> Login</a></p>

      </div>
    </div>
  </div>
  </div>
</section> --}}



<div class="conatiner">
  <div class="flex flex-col lg:w-[32%] md:w-full p-4 shadow-lg mx-auto mt-4">

      <div class="mt-2 border p-4">
          <h4 class="text-xl text-green font-semibold text-center">Register</h4>
      </div>

      <div class="lg:w-full md:w-full p-4">
        <form id="#" class="appoinment-form" method="post" action="{{route('signup')}}" autocomplete="off">
          @csrf
            <div class="flex mb-4">
                  <div class="w-full mr-4">
                    <label for="name">Name:</label>

                    <input name="name" id="name" type="text" class="form-control" placeholder="Name" autocomplete="off">

                    @if($errors->has('name'))
                    <strong style="color:red"> {{ $errors->first('name') }}</strong>
                    @endif
   </div>
              </div>

              <div class="flex mt-4">
                  <div class="w-full mr-4">
               

                    <label for="name">Email:</label>

                    <input name="email" id="email" type="email" class="form-control" placeholder="Email" autocomplete="off">
  
                    @if($errors->has('email'))
                    <strong style="color:red"> {{ $errors->first('email') }}</strong>
                    @endif

                    </div>
              </div>

              <div class="flex mb-4 mt-3">
                  <div class="w-full mr-4">
                 

                    <label for="name">Phone:</label>

                    <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone" maxlength="10" autocomplete="off">
  
                    @if($errors->has('phone'))
                    <strong style="color:red"> {{ $errors->first('phone') }}</strong>
                    @endif
  
              </div>
              </div>

              <div class="flex justify-between mt-4">
                  <div class="w-full mr-4">

                      <input type="checkbox" name="check" class="mr-2" />
                      <span>Are you agree to  Terms of Condition and Privacy Policy.</span>

                  </div>
              </div>


              <div class="flex mt-4">
                  <div class="w-full mr-4 flex flex-around">
                      <button class="border w-full p-3  border-green-500 text-base 
                      text-black hover:bg-green-400 hover:text-white" type="submit">
                          Register
                      </button>

                  </div>
              </div>
          </form>
      </div>
  </div>
</div>

@endsection