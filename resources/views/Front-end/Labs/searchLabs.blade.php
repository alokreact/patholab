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
                            {{$lab->sub_test_name }} 
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


<section class="section contact-info pb-0">
    <div class="container">
        <div class="row">
            @forelse ($labs as $lab)
                @forelse ($lab->getLab as $getlab)
                    <div class="col-lg-4 col-sm-6 col-md-6" style="margin-bottom:3px">
                        <div class="contact-block mb-4 mb-lg-0">
                            <img src="{{ asset('Image/'.$getlab->image) }}" alt="{{ $getlab->lab_name}}"
                                class="img-fluid" style="height:120px; width:230px">
                            <br />
                            <br />
                            <h5>{{$lab->sub_test_name}}</h5>
                            <br />
                            <h3>{{$getlab->lab_name}}</h3>
                            <span>
                                <i class="icofont-google-map"style="font-size:16px;color:#000"></i>{{ $lab->city }}
                            </span>
                            <br/>
                            <br/>
                            <h5>₹{{$getlab->pivot->price}}/- </h5>
                            @php
                                $cart = session('cart',[]);
                            @endphp

                            @if(session()->has('cart') && itemExistsInCarts($getlab->lab_name, $cart))
                                <button class="btn btn-main-2" disabled="true">Already Added</button>
                            @else
                                <button class="btn btn-main-2 btn_add_to_cart_test" value="{{$getlab->id}}"
                                    data-type="test" data-lab="{{$getlab->lab_name}}"
                                    data-price="{{$getlab->pivot->price}}" data-singleprice="{{$getLab->single_price}}">
                                    Checkout
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
 
@push('after-scripts')

<script>
    var addToCarturl = "{{ route('add_to_cart') }}";
    //var addToCarturl = "{{ route('cart') }}";

    $('.btn_add_to_cart_test').on('click', function() {

        console.log('>>>', 'working')
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

        console.log('productId', productId)

        $.ajax({
            type: "POST",
            data: formData,
            url: addToCarturl,
            success: function(response) {
                console.log('productId', response.status)
                if (response.status === 200) {
                    // window.location.reload();
                    $('#addtMsg').click();
                    $(button).attr('disabled', true);
                    $(button).html('Add To Cart');
                    //alert(response.message);
                    //window.location.reload();
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