@extends('Front-end.layout.mainlayout')
@section('content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Package</span>
                    <h1 class="text-capitalize mb-5 text-lg">{{ ucfirst($package['package_name']) }}</h1>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="section department-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="department-img">
                    <img src="images/service/bg-1.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-lg-7">
            <div class="department-content mt-5">
                <h3 class="text-md">{{ ucfirst($package['package_name']) }}</h3>
            <div class="divider my-4"></div>
                <p class="lead">{{$package['package_desc']}}</p>
                
                
                <h3 class="mt-5 mb-4">Tests</h3>
                    <div class="divider my-4"></div>

                    <div id="accordion">
                        @foreach ($package['grouptest'] as $parenttest)
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#desc{{$parenttest['id']}}">
                                    {{ ucfirst($parenttest['name']) }}
                                </a>
                            </div>
                        <div id="desc{{$parenttest['id']}}" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <ul class="list-unstyled department-service">
                                    @foreach ($parenttest['subtest'] as $subtest)
                                    <li>
                                        <i class="icofont-check mr-2"></i>
                                            {{$subtest['sub_test_name']}}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

            <div class="col-lg-5">
                <div class="sidebar-widget schedule-widget mt-5">
                    <ul class="list-unstyled">
                        <li class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-4">Price:</h5>
                            <span>
                                <h4>₹{{ $package['price'] }}</h4>
                            </span>
                        </li>

                        <li class="d-flex justify-content-between align-items-center">
                            <a href="#">
                                <h5 class="mb-4">Lab Name:</h5>
                            </a>
                            <span>
                                <h4>{{ ucfirst($package['get_lab']['lab_name'] ) }}</h4>
                            </span>
                        </li>
                    </ul>

                    <div class="sidebar-contatct-info mt-4">
                        <p class="mb-0">
                            <?php $items = []; ?>
                            @foreach ((array) session('cart') as $id => $details)
                            <?php
                            $items[] = $id;
                            ?>
                            @endforeach
                            @php
                            $cart = session('cart', []);
                            @endphp

                            @if(session()->has('cart') && packageExistsInCarts($package['package_name'], $cart ))

                            <button class="btn btn-main-2 btn_add_to_cart_test" disabled="true">
                                Already Added
                            </button>

                            @else
                            <button type="button" class="btn btn-main-2 btn-round-full btn_add_to_cart" value="{{ $package['id'] }}" data-type="package">
                                Add To Cart
                            </button>

                            @endif
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('Front-end.Package.modal');
@endsection

@push('after-scripts')
<script>
    var addToCarturl = "{{route('add_to_package')}}";
    $('.btn_add_to_cart').on('click', function() {
        $(this).html('<i class="icofont-spinner-alt-6" style="padding:2px"></i>');

        var productId = $(this).val();
        var dataType = $(this).attr("data-type");

        var formData = {
            productId: productId,
            dataType: dataType
        };
        console.log('productId', productId)
            $.ajax({
                type: "POST",
                data: formData,
                url: addToCarturl,
                success: function(response){
                    if (response.status === 200) {
                        Swal.fire({
                                icon: 'success',
                                title: 'Added Successfully',
                                //html: errorHtml,
                            }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload(); // Reload the page
                                    }
                            })
                    }
                },
                error: function(data) {
                    console.log(data);
                }
        });
    });
</script>
@endpush