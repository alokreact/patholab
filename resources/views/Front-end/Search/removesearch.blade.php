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

{{-- <div class="container mt-4">
    <div class="row">
        @include('Front-end.Search.template.sidebar')
        
        <main class="col-md-9">
            <header class="border-bottom mb-4 pb-3">
                <div class="form-inline">
                    <span class="mr-md-auto">
                        {{ count($combinedResults) }} Labs Found
                    </span>
                </div>
            </header><!-- sect-heading -->

            <div class="container">
                @forelse($combinedResults as $lab)
                    <div class="card bg-light-subtle mt-4">
                        <img src="{{ $lab['image'] ? asset('Image/' . $lab['image']) : 'http://localhost/applab/Image/202210160825WhatsApp Image 2022-10-16 at 01.25.30 (2).jpeg' }}"
                            alt="{{ $lab['lab_name'] }}">
                        <div class="testcard-body">
                            <div class="text-section">
                                <h5 class="fw-bold" style="font-size: 14px">{{ ucfirst($lab['test_names']) }}
                                </h5>
                                <p class="card-text">{{ ucfirst($lab['lab_name']) }}</p>
                                <span><i class="icofont-google-map"
                                        style="font-size:16px;color:#000"></i>{{ $lab['city'] }}</span>
                            </div>

                            <div class="cta-sectionn">
                                <div class="rates boxes " style="margin-left: 50px; width:100%">
                                    <del>₹<span class="_test_mrp">300/-</span></del>

                                    <div class="blue">₹<span class="_test_selling">150/-</span> </div>
                                    <div class="sm">50% discount </div>
                                </div>

                            </div>


                            <div class="add-button">
                                @php
                                    $cart = session('cart', []);
                                @endphp
                                @if (session()->has('cart') && itemExistsInCarts($lab['lab_name'], $cart))
                                    <button class="btn btn-main-2" disabled="true">Already Added</button>
                                @else
                                    <button class="btn btn-main-2 btn_add_to_cart_test" value="{{ $lab['id'] }}"
                                        data-type="test" data-lab="{{ $lab['lab_name'] }}"
                                        data-price="{{ $lab['total_price'] }}">
                                        Add To cart
                                    </button>
                                @endif
                            </div>

                        </div>
                    </div>
                @empty
                    <p></p>
                @endforelse
            </div>
        </main>
    </div>
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
                                text-green-500 rounded-full border p-2 hover:bg-green-500 hover:text-white"
                                
                                value="{{ $lab['id'] }}"
                                        data-type="test" data-lab="{{ $lab['lab_name'] }}"
                                        data-price="{{ $lab['total_price'] }}">
                                Add To Cart</button>
                        </div>

                        <div
                            class="p-3 mt-1 mb-1 items-center bg-gray-100 flex 
                            justify-between my-1 mx-1 rounded-full text-black">

                            <del>₹<span>460/-</span></del>
                            <span> ₹230/-</span>

                            <div class="sm">50% discount </div>

                        </div>

                    </div>

                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>

@push('after-scripts')
@endpush
