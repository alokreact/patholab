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
        max-width: 55%;
    }
    .text-section h5{
       color: #00a651 !important;
       font-size: 18px !important;
    }
    .text-section span,p{

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
</style>

 
@extends('Front-end.layout.mainlayout')
    @section('content')
    <div id="loadedViewContainer">

    <section class="page-title bg-1" >
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
                                <i class="icofont-close-circled removeSelected"  data-id="{{$lab->id}}"></i>
                            </div>
                            @empty
                                <p>No Tests</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="container mt-4">
        <div class="row">
            @include('Front-end.Search.template.sidebar')
            <main class="col-md-9">
                <header class="border-bottom mb-4 pb-3">
                    <div class="form-inline">
                        <span class="mr-md-auto">
                            {{-- @forelse ($labs as $lab)
          
                                {{count($lab)}}Items found 

                            @empty
                                <p></p>
                            
                            @endforelse --}}
                        </span>
                    </div>
                </header><!-- sect-heading -->

        <div class="container">

            @forelse ($combinedResults as $lab)
              
            <div class="card bg-light-subtle mt-4">
                <img src="{{$lab['image']? asset('Image/'.$lab['image']):'http://localhost/applab/Image/202210160825WhatsApp Image 2022-10-16 at 01.25.30 (2).jpeg' }}" alt="{{ $lab['lab_name'] }}">
            <div class="testcard-body">
                <div class="text-section">
                    <h5 class="card-title fw-bold" style="font-size: 14px">{{ ucfirst($lab['test_names']) }}</h5>
                    <p class="card-text">{{ ucfirst($lab['lab_name']) }}</p>
                    <span><i class="icofont-google-map"
                        style="font-size:16px;color:#000"></i>{{ $lab['city'] }}</span>
                </div>


                <div class="cta-sectionn">
                    {{-- <div>₹{{ $lab['total_price'] }}/-</div> --}}
                  
                    <div class="rates boxes " style="margin-left: 50px; width:100%">
                        <del>₹<span class="_test_mrp">{{ $lab['total_price'] * 2 }}/-</span></del>

                        <div class="blue">₹<span class="_test_selling">{{ $lab['total_price'] }}/-</span> </div>
                        <div class="sm">50% discount </div>

                    </div>
                    
                  @php
                        $cart = session('cart', []);
                    @endphp

                        @if(session()->has('cart') && itemExistsInCarts($lab['lab_name'], $cart))
                            <button class="btn btn-main-2 btn_add_to_cart_test" disabled="true">Already Added</button>
                        @else
                        <button class="btn btn-main-2 btn_add_to_cart_test" value="{{$lab['id']}}" data-type="test" data-lab="{{ $lab['lab_name'] }}" data-price="{{ $lab['total_price'] }}"
                        
                        data-singleprice="{{ $lab['single_price'] }}">
                                        Add To cart
                                    </button>
                                @endif
                    {{-- <a href="#" class="btn btn-dark">Buy Now</a> --}}
                    </div>
                </div>
            </div>
            {{-- @empty
            <p></p>
            @endforelse --}}
            @empty
            <p></p>
            @endforelse                    
        </div>

        
                {{-- <nav class="mt-4" aria-label="Page navigation sample">
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav> --}}

            </main>
        </div>
    </div>
    </div>
    @endsection


@push('after-scripts')
    <script>
        var addToCarturl = "{{ route('add_to_cart') }}";
        //var addToCarturl = "{{ route('cart') }}";
        $('.btn_add_to_cart_test').on('click', function() {

            var button = $(this);
            $(button).html('<i class="icofont-spinner-alt-6" style="padding:2px"></i>');

            var productId = $(this).val();
            var dataType = $(this).attr("data-type");
            var labId = $(this).attr("data-lab");
            var price = $(this).attr("data-price");
            var singleprice = $(this).attr("data-singleprice");

            var formData = {
                productId: productId,
                dataType: dataType,
                labId: labId,
                price: price,
                singleprice:singleprice
            };
            console.log('productId', productId)

            $.ajax({
                type: "POST",
                data: formData,
                url: addToCarturl,
                success: function(response) {
                    console.log('productId', response.status)
                    if (response.status === 200) {
                        // $('#addtMsg').click();
                        // $(button).attr('disabled', true);
                        // $(button).html('Add To Cart');
                         //window.location.reload();

                         Swal.fire({
                    	    icon: 'success',
                    	    title: 'Added Successfully',
                    	    //html: errorHtml,
                	    }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload(); // Reload the page
                            }
                        });
                    } else {
                        alert(response.data)
                        //window.location.reload();
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endpush

