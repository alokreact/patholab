@extends('Front-end.layout.mainlayout')
@section('content')

<div>

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
                                <i class="icofont-close-circled removeSelected" data-id="{{$lab->id}}"></i>
                            </div>
                        @empty
                            <p>No Tests</p>
                        @endforelse


                        <!-- <ul class="list-inline breadcumb-nav">
                                <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
                                <li class="list-inline-item"><span class="text-white">/</span></li>
                                <li class="list-inline-item"><a href="#" class="text-white-50">Contact Us</a></li>
                              </ul> -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section contact-info pb-0">
        <div class="container">
            <div class="row">

                @forelse ($labs as $lab)
                    @forelse ($lab->getLab as $getlab)
                        <div class="col-lg-4 col-sm-6 col-md-6" style="margin-bottom:3px">
                            <div class="contact-block mb-4 mb-lg-0">
                                <img src="{{ asset('Image/'.$getlab->image) }}" alt="{{ $getlab->lab_name }}"
                                    class="img-fluid" style="height:120px; width:230px">
                                <br />
                                <br />
                                <h5>{{ $lab->sub_test_name }} </h5>
                                <br />
                                <h3>{{ $getlab->lab_name }}</h3>
                                <span><i class="icofont-google-map"
                                        style="font-size:16px;color:#000"></i>{{ $getlab->city }}</span>
                                <br />
                                <br />
                                <h5>₹{{ $getlab->pivot->price }}/- </h5>
                                @php
                                    $cart = session('cart', []);
                                @endphp

                                @if (session()->has('cart') && itemExistsInCarts($getlab->lab_name, $cart))
                                    <button class="btn btn-main-2 btn_add_to_cart_test" disabled="true">
                                        Already Added
                                    </button>
                                @else
                                    <button class="btn btn-main-2 btn_add_to_cart_test" value="{{$lab->id}}"
                                        data-type="test" data-lab="{{ $getlab->lab_name }}"
                                        data-price="{{ $getlab->pivot->price }}" data-singleprice="{{$lab->single_price}}">
                                        Add To carts
                                    </button>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p></p>
                    @endforelse

                @empty
                    <p></p>
                @endforelse

            </div>
        </div>
    </section>

    @include('Front-end.Labs.modal');

</div>    
@endsection

@push('after-scripts')
    <script>
        var addToCarturl = "{{ route('add_to_cart')}}";
        $('.btn_add_to_cart_test').on('click', function(){
            //console.log('>>>', 'working')
            //var btn = $(this).find('.btn-blue');
            var button = $(this);
            $(button).html('<i class="icofont-spinner-alt-6" style="padding:2px"></i>');

            var productId = $(this).val();
            var dataType = $(this).attr("data-type");
            var labId = $(this).attr("data-lab");
            var price = $(this).attr("data-price");

            var formData = {
                productId: productId,
                dataType: dataType,
                labId: labId,
                price: price
            };
            $.ajax({
                type: "POST",
                data: formData,
                url: addToCarturl,
                success: function(response) {
                    console.log('productId', response.status)
                    if(response.status === 200) {
                         //$(button).html('Add To Cart');
                        Swal.fire({
                    	    icon: 'success',
                    	    title: 'Added Successfully',
                    	    //html: errorHtml,
                	    }).then((result) => {
          				if (result.isConfirmed) {
            				window.location.reload(); // Reload the page
          				}
                    } else {
                        Swal.fire({
                    	    icon: 'error',
                    	    title: response.data,
                    	    //html: errorHtml,
                	    }).then((result) => {
          				if (result.isConfirmed) {
            				window.location.reload(); // Reload the page
          				}
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endpush
