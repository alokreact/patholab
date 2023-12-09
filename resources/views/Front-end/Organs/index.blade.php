@extends('Front-end.layout.mainlayout')
@section('content')
     
 
    <section class="section contact-info pb-0">
        <div class="container mx-auto">

            @include('Front-end.Components.breadcrumb',['breadcrumbs'=>$breadcrumbs])

             
            <div class="flex md:flex-row flex-col">
                @include('Front-end.Components.sidebar')

                <div class="flex-col md:flex-row md:w-3/4 p-4 w-full">
                    <div class="w-full mb-4 text-xs font-semibold">
                        Showing {{ count($allorgans) }} results
                    </div>

                    <div class="w-full flex flex-wrap mx-2">
                        @forelse ($allorgans as $organ)
                            <div class="w-full md:w-[31%] flex  items-center mx-2 flex-col">
                                <div class="product-bg bg-cover p-2">
                                    <a href="{{ route('testbyorgan', $organ->id) }}">
                                        <img src="{{ asset('Image/' . $organ->image) }}" alt="{{ $organ->name }}"
                                            class="w-full md:w-56 h-56 object-cover" />
                                    </a>
                                </div>

                                <div class="p-4 mt-2 items-center flex flex-col">
                                    <h2 class="text-black text-xl font-semibold mb-2">{{ $organ->name }}</h2>
                                    <a href="{{ route('testbyorgan', $organ->id) }}"> 
                                        <button class="w-[120px] btn border-green-500 text-green-500 rounded-full border px-4 py-2  hover:bg-green-500 hover:text-white">
                                            View</button>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p> No Results Found!</p>
                        @endforelse
                    </div>



                    <div class="flex justify-end w-full mt-4 text-green-400">
                        {{ $allorgans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
