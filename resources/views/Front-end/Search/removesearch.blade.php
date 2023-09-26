
 
 
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
    @forelse($combinedResults as $lab)
            
    <div class="card bg-light-subtle mt-4">
            <img src="{{$lab['image']? asset('Image/'.$lab['image']):'http://localhost/applab/Image/202210160825WhatsApp Image 2022-10-16 at 01.25.30 (2).jpeg' }}" alt="{{ $lab['lab_name'] }}">
        <div class="testcard-body">
            <div class="text-section">
                <h5 class="card-title fw-bold" style="font-size: 14px">{{ ucfirst($lab['test_names']) }}</h5>
                <p class="card-text">{{ ucfirst($lab['lab_name']) }}</p>
                <span><i class="icofont-google-map" style="font-size:16px;color:#000"></i>{{ $lab['city'] }}</span>
            </div>

            <div class="cta-sectionn">
                <div>₹{{ $lab['total_price'] }}/-</div>
                    @php
                        $cart = session('cart', []);
                        echo "<pre>"; print_r($cart);
                            
                    @endphp

                        @if(session()->has('cart') && itemExistsInCarts($lab['lab_name'], $cart))
                            <button class="btn btn-main-2 btn_add_to_cart_test" disabled="true">Already Added</button>
                        @else
                       
                        <button class="btn btn-main-2 btn_add_to_cart_test" value="{{$lab['id']}}" data-type="test" data-lab="{{ $lab['lab_name'] }}"data-price="{{ $lab['total_price'] }}">
                                        Add To cart
                                    </button>
                                @endif
                    {{-- <a href="#" class="btn btn-dark">Buy Now</a> --}}
                </div>
            </div>
        </div>
         
        @empty
        <p></p>
        @endforelse                    
    </div>

        
         
        </main>
    </div>
</div>


@push('after-scripts')
    <script>
        var addToCarturl = "{{ route('add_to_cart') }}";
        //var addToCarturl = "{{ route('cart') }}";
        $(document).on('click','.btn_add_to_cart_test', function() {

            var button = $(this);
            console.log('>>>','test')

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
                    if (response.status === 200) {
                    
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

