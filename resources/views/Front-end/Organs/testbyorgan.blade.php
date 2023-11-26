@extends('Front-end.layout.mainlayout')
@section('content')
    <div id="loader"
        class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex justify-center items-center z-50 hidden">
        <div class="loader ease-linear rounded-full border-8 border-t-8 border-gray-200 h-12 w-12"></div>
    </div>

    <section class="page-title bg-1" id="test_header">
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


    <section class="page-title bg-1 hidden" id="searchBreadcumb">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white"></span>
                        <h1 class="text-capitalize mb-5 text-lg">Select Lab for Home Sample Collection</h1>

                        <div id="chipResult"></div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row">
            @include('Front-end.Components.sidebar')

            <div class="w-full md:w-2/3 p-4">
                <div class="flex justify-between" id="count_result">
                    <div class="w-[50%] mb-4 text-xl font-semibold">
                        Showing {{ count($subtests) }} results
                    </div>

                    <div class="w-[50%] mb-4 text-xl font-semibold flex justify-end">
                        <button
                            class="border border-green-500 w-[120px]  
                        rounded-full p-2 text-basic text-black hover:scale-110 hover:bg-green-500 
                        hover:text-white search_multiple_test_btn">Check
                            Now</button>

                    </div>
                </div>

                <div class="flex flex-wrap mx-2" id="organResult">
                    @forelse($subtests as $test)
                        <div class="w-full md:w-[31%] mb-4 border mx-2">
                            <div class="w-full mt-1 flex justify-end p-2">
                                <input type="checkbox" name="test[]" class="test_id" value="{{ $test->id }}" />
                            </div>


                            <div class="border-b-2 rounded w-[106px] p-3 mx-auto">
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
                                {{-- <div class="sm">Include : 1 Parameters </div> --}}

                            </div>

                            {{-- <div class="flex flex-end justify-end mt-1 p-2">
                                <form action="{{ route('searchsubtest') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $test->id }}" name="subtest" />
                                    <button type="submit"
                                        class="w-[120px]  border-green-500
                              text-green-500 rounded-full border p-2 hover:bg-green-500 hover:text-white">
                                        Book Now</button>
                                </form>

                            </div> --}}
                        </div>
                    @empty
                    @endforelse
                </div>

                <div class="flex flex-wrap mx-2" id="searchResult">
                </div>

            </div>
        </div>
    </div>
@endsection
