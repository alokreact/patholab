


@extends('Front-end.layout.mainlayout')
@section('content')
    {{-- <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">All Health Package</span>
                        <h1 class="text-capitalize mb-5 text-lg">Categories</h1>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <div class="container mt-4">
        <nav class="flex  mb-2 mt-0" aria-label="Breadcrumb">
            <span class="text-gray-500 text-xs mx-2"><i class="icofont-home"></i>Home</span>
            <span class="mx-2 text-xs"> <i class="icofont-rounded-right"></i> </span>
            <a href="#" class="text-black-500 text-xs font-semibold hover:underline mx-2">Packages</a>
            
            
        </nav>
   
        <div class="row">

         
            @include('Front-end.Components.sidebar')
            
            <main class="col-md-9">
            
                    <div class="flex  justify-between mb-4 pb-3 mt-4">
                        <span class="mr-md-auto">Showing {{ count($all_categories) }} results</span>
                        <span class="flex justify-end md:hidden">Filter <i class="icofont-filter text-xl ml-2" id="filterButton"></i></span>
                    
                    </div>
                
                <!-- sect-heading -->

                <div class="container">
                    <div class="row">
                        @forelse ($all_categories as $category)
                            <div class="col-lg-4 col-sm-6 col-md-6" style="margin-bottom:3px">
                                <div class="contact-block mb-4 mb-lg-0">
                                    <h5>{{ ucfirst($category->category_name) }}</h5>
                                    <div class="card-body">
                                        <a href="{{ route('category.package', $category->id) }}"
                                            class="card-link btn btn-success">View</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No Results Found!</p>
                        @endforelse
                    </div>

                    <div class="flex justify-end w-full mt-4 text-green-400">
                        {{ $all_categories->links() }}
                    </div>
                </div>

            </main>
        </div>
    </div>
@endsection


 
