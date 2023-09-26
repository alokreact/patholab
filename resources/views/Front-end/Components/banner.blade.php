<section class="banner banner-sec">
    <div class="d-flex-desk">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12">

                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($banners as $key=>$banner)
                           
                                <li data-target="#demo" data-slide-to="{{$key}}" class="{{$key=== 0?'active':''}}"></li>
                           
                            @endforeach
                          </ol>
                        <div class="carousel-inner">
                            @foreach ($banners as $banner)
                                @if (!empty($banner->url))
                                    <div class="carousel-item {{ $banner->position === '1' ? 'active' : '' }}">
                                        <a href="{{ url($banner->url) }}">
                                            <img src="{{ asset('images/bg/' . $banner->image) }}" class="img-responsive">
                                        </a>
                                    </div>
                                @else
                                    <div class="carousel-item ">
                                        <img src="{{ asset('images/bg/' . $banner->image) }}" class="img-responsive">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="banner-form">
                        <div class="region region-schedule-home-collection">
                            <form action="#" method="post" id="otpFormSubmit">

                              <h3>Schedule a Home Collection</h3>

                                <div class="form-group">
                                  <input name="name" id="name" type="text" class="form-control" placeholder="Full Name*" style="height: 60px; padding:8px">
                                </div>
                               
                               <div class="form-group">
                                  <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone*" maxlength="10" style="height: 60px; padding:8px">
                                </div>

                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1" name="option" style="height: 60px; padding:8px">
                                        <option value="">Select Reason </option>
                                        <option value="1">Nurse at Home</option>
                                        <option value="2">Medicine Home Delivery</option>
                                        <option value="3">Lab Test at Home</option>
                                        <option value="4">Physiotherapist at Home</option>
                                        <option value="5">X-Ray ECG at Home</option>
                                        <option value="6">MRI, USG , CT SCAN</option>
                                       </select>                                </div>
                                <input class="btn btn-main-2 btn-round-full" type="button" value="Submit">
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
