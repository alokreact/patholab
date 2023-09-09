@extends('Front-end.layout.mainlayout')
@section('content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <span class="text-white">Book your Seat</span>
            <h1 class="text-capitalize mb-5 text-lg">Appoinment</h1>
  
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
         <div class="col-lg-4">
          <div class="side-overlay"></div>
            {{--<div class="mt-3">
              <div class="feature-icon mb-3">
                <i class="icofont-support text-lg"></i>
              </div>
               <span class="h3">Call for an Emergency Service!</span>
                <h2 class="text-color mt-3">+{{env('PHONE')}} </h2>
            </div>--}}

            <img src="{{asset('images/bg/book-test.png')}}"  class="img-responsive" style="max-width: 100%"/>
     


        </div>
  
        <div class="col-lg-8">
             <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
              <h2 class="mb-2 title-color">Book an appoinment</h2>
              <p class="mb-4">Mollitia dicta commodi est recusandae iste, natus eum asperiores corrupti qui velit . Iste dolorum atque similique praesentium soluta.</p>
                 <form id="#" class="appoinment-form" method="post" action="{{route('appointment.submit')}}">
                      
                  @csrf
                  <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                  <select class="form-control" id="exampleFormControlSelect1" name="option">
                                    <option value="">Select Reason </option>
                                    <option value="1">Nurse at Home</option>
                                    <option value="2">Medicine Home Delivery</option>
                                    <option value="3">Lab Test at Home</option>
                                    <option value="4">Physiotherapist at Home</option>
                                    <option value="5">X-Ray ECG at Home</option>
                                    <option value="6">MRI, USG , CT SCAN</option>
                                   </select>
                              </div>
                              @if($errors->has('option'))
                              <strong style="color:red"> {{ $errors->first('option') }}</strong>
                            @endif
                          </div>
                          {{-- <div class="col-lg-6">
                              <div class="form-group">
                                  <select class="form-control" id="exampleFormControlSelect2">
                                    <option>Select Doctors</option>
                                    <option>Software Design</option>
                                    <option>Development cycle</option>
                                    <option>Software Development</option>
                                    <option>Maintenance</option>
                                    <option>Process Query</option>
                                    <option>Cost and Duration</option>
                                    <option>Modal Delivery</option>
                                  </select>
                              </div>
                          </div> --}}
  
                           <div class="col-lg-6">
                              <div class="form-group">
                                  <input name="name" id="name" type="text" class="form-control" placeholder="Full Name">
                                  @if($errors->has('name'))
                                  <strong style="color:red"> {{ $errors->first('name') }}</strong>
                                @endif
                                </div>
                          </div>
  
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone">
                                  @if($errors->has('phone'))
                                  <strong style="color:red"> {{ $errors->first('phone') }}</strong>
                                @endif
                                </div>
                          </div>
                        
                          <div class="col-lg-6">
                              <div class="form-group">
                                <textarea class="form-control" name="address" rows="2" placeholder="Address"></textarea>
                                @if($errors->has('address'))
                                  <strong style="color:red"> {{ $errors->first('address') }}</strong>
                                @endif
                              </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                                <input name="city" id="city" type="text" class="form-control" placeholder="City">
                                @if($errors->has('city'))
                                <strong style="color:red"> {{ $errors->first('city') }}</strong>
                              @endif
                              </div>
                        </div>
                      
                        <div class="col-lg-6">
                          <div class="form-group">
                              <input name="pin" id="pin" type="text" class="form-control" placeholder="Pin">
                              @if($errors->has('pin'))
                              <strong style="color:red"> {{ $errors->first('pin') }}</strong>
                            @endif
                            </div>
                      </div>
                    
  
                        
                      </div>
                    
                      <button  type="submit" class="btn btn-main btn-round-full" >Make Appoinment<i class="icofont-simple-right ml-2"></i></button>
                  </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
  