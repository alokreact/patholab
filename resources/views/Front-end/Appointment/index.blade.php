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
  
          
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="appoinment section">
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
              <h2 class="mb-2 title-color">Book an appoinment</h2>
              <p class="mb-4">Mollitia dicta commodi est recusandae iste, natus eum asperiores corrupti qui velit . Iste dolorum atque similique praesentium soluta.</p>
                 <form id="#" class="appoinment-form" method="post" >
                      
                  @csrf
                  <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                  <select class="form-control" id="option" name="option">
                                    <option value="">Select Reason </option>
                                    <option value="1">Nurse at Home</option>
                                    <option value="2">Medicine Home Delivery</option>
                                    <option value="3">Lab Test at Home</option>
                                    <option value="4">Physiotherapist at Home</option>
                                    <option value="5">X-Ray ECG at Home</option>
                                    <option value="6">MRI, USG , CT SCAN</option>
                                   </select>

                                   <span class="error_reason"></span>
                              </div>
                              @if($errors->has('option'))
                              <strong style="color:red"> {{ $errors->first('option') }}</strong>
                            @endif
                          </div>
           
                           <div class="col-lg-6">
                              <div class="form-group">
                                  <input name="name" id="name" type="text" class="form-control" placeholder="Full Name">
                                  <span class="error_name"></span>
                                  @if($errors->has('name'))
                                    <strong style="color:red"> {{ $errors->first('name') }}</strong>
                                @endif
                                </div>
                          </div>
  
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone">
                                  <span class="error_phone"></span>
                               
                                  @if($errors->has('phone'))
                                    <strong style="color:red"> {{ $errors->first('phone') }}</strong>
                                @endif
                                </div>
                          </div>
                        
                          
                         
  
                        
                      </div>
                    
                      <button  type="button" class="btn btn-main btn-round-full appointment-btn" >Make Appoinment<i class="icofont-simple-right ml-2"></i></button>
                  </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
  