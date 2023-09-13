<section class="banner"> 

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
      </div>
    </div>
  </div>
  
</section>

  