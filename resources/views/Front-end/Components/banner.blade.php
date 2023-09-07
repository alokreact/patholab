<section class="banner">
  <div class="container">
  <div class="col-lg-12 col-md-12 col-xl-12">

    <div id="demo" class="carousel slide" data-ride="carousel">

       <div class="carousel-inner">
          
        @foreach ($banners as $banner)

        @if(!empty($banner->url))

        <div class="carousel-item {{$banner->position === '1'? 'active':''}}">

          <a href="{{url($banner->url)}}">

            <img src="{{asset('images/bg/'.$banner->image)}}" class="img-responsive">
          </a>
        </div>

        @else
        <div class="carousel-item ">
          <img src="{{asset('images/bg/'.$banner->image)}}" class="img-responsive">
        </div>


        @endif

        @endforeach


        <!-- <div class="carousel-item active">
      <img src="{{asset('images/bg/banner1.jpeg')}}"  class="img-responsive" >
    </div>-->
  
  


      </div>
    </div>
  </div>
  </div>
</section>


    <div class="carousel-item ">

          <a href="http://calllabs.in/category/package/7">

            <img src="http://calllabs.in/images/bg/202307010445banner4.jpeg" class="img-responsive">
          </a>
        </div>
  <div class="carousel-item">
      <img src="{{asset('images/bg/banner2.jpeg')}}" class="img-responsive" alt="Chicago" >
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/bg/banner3.jpeg')}}" class="img-responsive" alt="New York">
    </div>

    <div class="carousel-item">
      <img src="{{asset('images/bg/banner4.jpeg')}}" class="img-responsive" alt="New York">
    </div> -->