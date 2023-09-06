@extends('Front-end.layout.mainlayout')
@section('content')

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white"></span>
            <h1 class="text-capitalize mb-5 text-lg">Select Test For Home Sample Collection {{$testsbyOrgan->name}}</h1>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="section contact-info pb-0">
  <div class="container">
      <div class="row">
        @include('Front-end.Search.template.sidebar')

        <main class="col-md-9">
          <header class="border-bottom mb-4 pb-3">
              <div class="form-inline">
                  <span class="mr-md-auto">{{count($subtests)}} Items Found</span>
              </div>
          </header><!-- sect-heading -->

          <div class="container">
            <div class="row">

        @forelse($subtests as $test)
          <div class="col-lg-4 col-sm-6 col-md-6" style="margin-bottom:3px">
            <div class="contact-block mb-4 mb-lg-0">                  
                <h3>{{ucfirst($test->sub_test_name)}}</h3><br/>
                  <form action="{{route('searchsubtest')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$test->id}}" name="subtest"/>
                   <button type="submit" class="btn btn-success" rout>Book Now</button>
                  </form>                
                </div>
            </div>
            
          @empty
          <p>No Data</p>
          @endforelse
            </div>
          </div>
        </div>
      </main>
    </div>
</section>

@endsection
