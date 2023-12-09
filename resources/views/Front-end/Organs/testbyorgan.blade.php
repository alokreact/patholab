@extends('Front-end.layout.mainlayout')
@section('content')
    <div id="loader"
        class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex justify-center items-center z-50 hidden">
        <div class="loader ease-linear rounded-full border-8 border-t-8 border-gray-200 h-12 w-12"></div>
    </div>

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

    <section class="section contact-info pb-0">

        <div class="container mx-auto mt-2">
            @include('Front-end.Components.breadcrumb', ['breadcrumbs' => $breadcrumbs])

            <div class="flex flex-col md:flex-row">

                @include('Front-end.Components.sidebar')

                <div class="w-full md:w-2/3 p-4">

                    <div class="flex justify-between p-2  my-2" id="count_result">
                        Showing {{ count($subtests) }} results

                        <button
                            class="border border-green-500 w-[120px]  rounded-full p-2 text-black hover:scale-110 hover:bg-green-500 hover:text-white search_multiple_test_btn">Check
                            Now</button>

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
                                    <h6 class="text-black text-basic text-center font-semibold mb-1">
                                        {{ ucfirst($test->sub_test_name) }}
                                    </h6>
                                </div>

                                <div
                                    class="p-2  mb-1 items-center  flex 
                          justify-center my-1 mx-1 text-black text-xs">
                                    <h3 class="text-xs"> BEST VALUE, FASTER REPORTS</h3>


                                </div>


                            </div>
                        @empty
                        @endforelse
                    </div>

                    <div class="flex flex-wrap mx-2" id="searchResult">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
