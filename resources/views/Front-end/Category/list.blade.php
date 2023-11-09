<style>
    .icon-control {
        margin-top: 5px;
        float: right;
        font-size: 80%;
    }

    .btn-light {
        background-color: #fff;
        border-color: #e4e4e4;
    }

    .list-menu {
        list-style: none;
        margin: 0;
        padding-left: 0;
    }

    .list-menu a {
        color: #343a40;
    }

    .card-product-grid .info-wrap {
        overflow: hidden;
        padding: 18px 20px;
    }

    .card-product-grid:hover .btn-overlay {
        opacity: 1;
    }

    .card-product-grid .btn-overlay {
        -webkit-transition: .5s;
        transition: .5s;
        opacity: 0;
        left: 0;
        bottom: 0;
        color: #fff;
        width: 100%;
        padding: 5px 0;
        text-align: center;
        position: absolute;
        background: rgba(0, 0, 0, 0.5);

    }

    .bg-light-subtle {
        max-width: 95%;
        flex-direction: row !important;
        background-color: #696969;
        border: 0;
        box-shadow: 0 7px 7px rgba(0, 0, 0, 0.18);
        /* margin: 0px auto; */
    }

    .card.dark {
        color: #fff;
    }

    .card.card.bg-light-subtle .card-title {
        color: dimgrey;
    }

    .card img {
        max-width: 25%;
        margin: 22px;
        padding: 0.5em;
        border-radius: 0.7em;
    }

    .testcard-body {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .text-section {
        max-width: 70%;
    }

    .cta-sectionn {
        max-width: 30%;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: space-between;
    }

    .cta-sectionn .btn {
        padding: 0.3em 0.5em;
        /* color: #696969; */
    }

    .card.bg-light-subtle .cta-sectionn .btn {
        background-color: #00a651;
        border-color: #00a651;
    }

    @media screen and (max-width: 475px) {
        .card {
            font-size: 0.9em;
        }
    }
</style>

 
@extends('Front-end.layout.mainlayout')
    @section('content')
  
    <section class="page-title bg-1">
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
    </section>

    <div class="container mt-4">
        <div class="row">
                @include('Front-end.Components.sidebar')
            
            <main class="col-md-9">
                <header class="border-bottom mb-4 pb-3">
                    <div class="form-inline">
                        <span class="mr-md-auto">Showing {{count($all_categories)}} results</span>
                    </div>
                </header><!-- sect-heading -->

        <div class="container">
            <div class="row">
                @forelse ($all_categories as $category)
                    <div class="col-lg-4 col-sm-6 col-md-6" style="margin-bottom:3px">
                        <div class="contact-block mb-4 mb-lg-0">

                            <h5>{{ucfirst($category->category_name)}}</h5>
                            <div class="card-body">
                                <a href="{{route('category.package',$category->id)}}" class="card-link btn btn-success">View</a>
                            </div>
                        </div>
                  </div>
                @empty
                <p>No Records</p>
                @endforelse
            </div>
        </div>

        </main>
    </div>
</div>

    @endsection

@push('after-scripts')
 
@endpush

