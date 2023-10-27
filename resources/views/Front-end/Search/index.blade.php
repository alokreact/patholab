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
        margin: 20px;
        padding: 0.5em;
        border-radius: 0.7em;
        height: 90px;
    }

    .testcard-body {
        display: flex;
        justify-content: space-between;
        width: 100%;
        flex-direction: column
    }

    .text-section {
        max-width: 100%;
    }

    .text-section h5 {
        color: #00a651 !important;
        font-size: 14px !important;
        font-weight: 400;
    }

    .text-section span,
    p {

        font-size: 14px;
        color: #222;
        font-weight: 500;
    }


    .cta-sectionn {
        max-width: 45%;
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

    .add-button {
        display: flex;
        justify-content: flex-end;
    }
</style>


@extends('Front-end.layout.mainlayout')
@section('content')
    <div id="loadedViewContainer">

        <section class="page-title bg-1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block text-center">
                            <span class="text-white"></span>
                            <h1 class="text-capitalize mb-5 text-lg">Select Lab for Home Sample Collection</h1>
                            @forelse($labs as $lab)
                                <div class="chip">
                                    {{ $lab->sub_test_name }}
                                    <i class="icofont-close-circled removeSelected" data-id="{{ $lab->id }}"></i>
                                </div>
                            @empty
                                <p>No Tests</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="mt-1">
            {{-- <div class="row">
                @include('Front-end.Search.template.sidebar')

                <main class="col-md-9 test-search">
                    <header class="border-bottom mb-4 pb-3">
                        <div class="form-inline">
                            <span class="mr-md-auto">
                                {{ count($combinedResults) }} Labs Found
                            </span>
                        </div>
                    </header><!-- sect-heading -->

                    <div class="container">
                        @forelse ($combinedResults as $lab)
                            <div class="card bg-light-subtle mt-4">
                                <img src="{{ $lab['image'] ? asset('Image/' . $lab['image']) : 'http://localhost/applab/Image/202210160825WhatsApp Image 2022-10-16 at 01.25.30 (2).jpeg' }}"
                                    alt="{{ $lab['lab_name'] }}">
                                <div class="testcard-body">
                                    <div class="text-section">
                                        <h5 class="fw-bold" style="font-size: 14px">
                                            {{ ucfirst($lab['test_names']) }}</h5>

                                        <p class="card-text">{{ ucfirst($lab['lab_name']) }}</p>
                                        <span><i class="icofont-google-map"
                                                style="font-size:16px;color:#000"></i>{{ $lab['city'] }}</span>
                                    </div>


                                    <div class="cta-sectionn">
                                        <div class="rates boxes " style="margin-left: 50px; width:100%">
                                            <del>₹<span class="_test_mrp">{{ $lab['total_price'] * 2 }}/-</span></del>

                                            <div class="blue">₹<span
                                                    class="_test_selling">{{ $lab['total_price'] }}/-</span> </div>
                                            <div class="sm">50% discount </div>
                                        </div>
                                    </div>

                                  
                                    <div class="add-button">
                                        
                                        <button class="btn btn-main-2 btn_add_to_cart_test" value="{{ $lab['id'] }}"
                                            data-type="test" data-lab="{{ $lab['lab_id'] }}"
                                            data-price="{{ $lab['total_price'] }}"
                                            data-singleprice="{{ $lab['single_price'] }}">
                                            Add To cart
                                        </button>



                                    </div>
                                </div>
                            </div>

                        @empty
                            <p></p>
                        @endforelse
                    </div>



                </main>
            </div> --}}


            <div class="container mx-auto">
                <div class="flex">

                    @include('Front-end.Components.sidebar')


                    <div class="w-2/3 p-4">

                        <div class="w-full mb-4 text-xl font-semibold">
                            Showing {{ count($combinedResults) }} results

                        </div>

                        <div class="flex flex-wrap mx-2">
                            @forelse ($combinedResults as $lab)
                                <div class="w-[31%] mb-4 border mx-2">
                                    <div class="border-b-2 rounded w-[260px] h-[144px] p-3 mx-auto">
                                        <img src="{{ asset('Image/' . $lab['image']) }}" class="" />
                                    </div>


                                    <div class="p-4 mt-2 items-center flex justify-between">
                                        <h6 class="text-black text-basic font-semibold mb-2">

                                            <i class="icofont-google-map" style="font-size:16px;color:#000"></i>Hyderabad
                                        </h6>

                                        <button
                                            class="w-[120px]  border-green-500 
                                            text-green-500 rounded-full border p-2 hover:bg-green-500 
                                            hover:text-white btn_add_to_cart_test"
                                            value="{{ $lab['id'] }}" data-type="test" data-lab="{{ $lab['lab_id'] }}"
                                            data-price="{{ $lab['total_price'] }}"
                                            data-singleprice="{{ $lab['single_price'] }}">
                                            Add To Cart</button>
                                    </div>

                                    <div
                                        class="p-3 mt-1 mb-1 items-center bg-gray-100 flex 
                                        justify-between my-1 mx-1 rounded-full text-black">

                                        <del>₹<span>{{ $lab['total_price'] * 2 }}/-</span></del>
                                        <span> ₹{{ $lab['total_price'] }}/-</span>

                                        <div class="sm">50% discount </div>

                                    </div>

                                </div>

                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection


    @push('after-scripts')
        <script></script>
    @endpush
