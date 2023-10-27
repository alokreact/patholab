@extends('Front-end.layout.mainlayout')
@section('content')
    <style>
        :root {
            --primary-color: #00a651;
            --secondary-color: #F01400;
            --color-greys: #222;
        }

        .contact-block {
            height: 315px;

        }

        .contact-block form {
            display: flex;
            justify-content: flex-end;
            margin: 1px;
            padding: 3px;
        }

        .ProductCard {
            /* border-bottom: 1px solid #d9d9d9; */
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            row-gap: 10px;
            height: 255px;

        }

        .ProductCard__head {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .ProductCard__head__heading {

            width: 70%;
        }

        .ProductCard__head__heading span {
            font-weight: 500;
            font-size: 18px;
            line-height: 21px;
            color: var(--secondary-color);
        }

        .ProductCard__head__price {
            display: flex;
            flex-direction: column;
        }

        .ProductCard__foot {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ProductCard__foot_item {
            display: flex;
            flex-direction: column;
            row-gap: 10px;
        }
    </style>

    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white"></span>
                        <h1 class="text-capitalize mb-5 text-md">Home Sample Collection <br />{{ $testsbyOrgan->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="section contact-info pb-0">
  <div class="container">
      <div class="row">
        @include('Front-end.Search.template.sidebar')
        <main class="col-md-9">
          
          <header class="border-bottom mb-4 pb-3">
              <div class="form-inline">
                  <span class="mr-md-auto">Found {{count($subtests)}} tests results</span>
              </div>
          </header><!-- sect-heading -->

          <div class="container">
          <div class="row">

          @forelse($subtests as $test)
            <div class="col-lg-6 col-sm-12 col-md-12" style="margin-bottom:10px">
              <div class="contact-block mb-lg-0" style="padding:0px;text-align :left">                  
                  
                  <div class="ProductCard">
                    <div class="ProductCard__head">
                      <div class="ProductCard__head__heading">
                        <span>{{ucfirst($test->sub_test_name)}}</span>
                      </div>

                      <div class="ProductCard__head__price">
                        <span><input type="checkbox" name="test"/></span>
                      </div>
                    </div>

                    <div class="ProductCard__foot">

                      <div class="ProductCard__foot_item">
                        <div class="field_content1 mt-2">
                          <img src="{{asset('images/service/icon-1.png')}}" />
                          <span>Include : 1  Parameters</span>
                        </div>
                        <div class="field_content2 mt-2">
                          <img src="{{asset('images/service/icon-2.png')}}" />
                          <span>Specimen : {{ucfirst($test->sample_type)}}</span>
                        </div>
                        <div class="field_content3 mt-2">
                          <img src="{{asset('images/service/icon-3.png')}}" />
                          <span>Report Delivery : NA</span>
                        </div>
                      </div>
                     
                    </div>

                  </div>

                  <form action="{{route('searchsubtest')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$test->id}}" name="subtest"/>
                    <button type="submit" class="btn btn-main-2 btn-round-full btn-icon" rout>Book Now</button>
                  </form>
                          
              </div>
            </div>
          @empty

            <p>No Test Packages Found</p>
          
          @endforelse

            </div>
          </div>
        </div>
      </main>
    </div>
</section> --}}



    <div class="container mx-auto">
        <div class="flex">

            @include('Front-end.Components.sidebar')

            <div class="w-2/3 p-4">

                <div class="w-full mb-4 text-xl font-semibold">
                    Showing {{ count($subtests) }} results

                </div>

                <div class="flex flex-wrap mx-2">
                    @forelse($subtests as $test)
                        <div class="w-[31%] mb-4 border mx-2">

                            <div class="border-b-2 rounded w-[260px] p-3 mx-auto">
                                <img src="{{ asset('Image/' . $testsbyOrgan['image']) }}" class=""
                                    style="max-width: 100%" />
                            </div>

                            <div class="p-4 mt-1  items-center">
                                <h6 class="text-black text-basic text-center font-semibold mb-2">
                                    {{ ucfirst($test->sub_test_name) }}
                                </h6>
                            </div>

                            <div
                                class="p-4 mt-1 mb-1 items-center bg-gray-100 flex 
                          justify-between my-1 mx-1 text-black">


                                <div class="sm"><img src="{{ asset('images/service/icon-1.png') }}" /></div>
                                <div class="sm">Include : 1 Parameters </div>

                            </div>


                            <div class="flex flex-end justify-end mt-1 p-2">
                                <form action="{{ route('searchsubtest') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $test->id }}" name="subtest" />
                                    <button type="submit"
                                        class="w-[120px]  border-green-500
                              text-green-500 rounded-full border p-2 hover:bg-green-500 hover:text-white">
                                        Book Now</button>
                                </form>

                            </div>
                        </div>
                    @empty
                    
                  @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
