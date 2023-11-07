@extends('Front-end.layout.mainlayout')
@section('content')

    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white"></span>
                        <h1 class="text-capitalize mb-5 text-lg">Organs</h1>

                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- <section class="section contact-info pb-0">
    <div class="container">
         <div class="row">
          @forelse ($allorgans as $organ)
          <div class="col-lg-4 col-sm-6 col-md-6" style="margin-bottom:3px">
                <div class="contact-block mb-4 mb-lg-0">
                
                  <img src="{{asset('Image/'.$organ->image)}}" alt="{{$organ->name}}" class="img-fluid"  style="height:90px; width:80px">			  
                   <a href="{{route('testbyorgan',$organ->id)}}"><h5>{{$organ->name}}</h5></a>
                    
                </div>
            </div>
          @empty
          <p>Not Available for now.</p>
            
          @endforelse
        </div>

        {!! $allorgans->links() !!}
    </div>
</section> --}}




    <section class="section contact-info pb-0">

        <div class="container mx-auto">
            <div class="flex md:flex-row flex-col">
                @include('Front-end.Components.sidebar')

                <div class="flex-col md:flex-row md:w-3/4 p-4 w-full">
                    <div class="w-full mb-4 text-xl font-semibold">
                        Showing {{ count($allorgans) }} results
                    </div>


                    <div class="w-full flex flex-wrap mx-2">
                        @forelse ($allorgans as $organ)
                            <div class="w-full md:w-[31%] flex  items-center mx-2 flex-col">
                                <div class="product-bg bg-cover p-2">
                                    <img src="{{ asset('Image/' . $organ->image) }}" alt="{{ $organ->name }}"
                                        class="w-full md:w-56 h-56 object-cover" />
                                </div>

                                <div class="p-4 mt-2 items-center flex flex-col">
                                    <h2 class="text-black text-xl font-semibold mb-2">{{ $organ->name }}</h2>
                                    <a href="{{ route('testbyorgan', $organ->id) }}"> <button
                                            class="w-[120px] btn border-green-500 text-green-500 rounded-full border px-4 py-2  hover:bg-green-500 hover:text-white">View</button>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p> No Results Found!</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
