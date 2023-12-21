@if(session()->has('coupon_sesssion'))
@php
    $sessionArray = session('coupon_sesssion', []);
@endphp

<div class="p-3 bg-light mb-3 mt-4 referal_coupon_box">
    <h6 class="apply_coupon_title font-size-16 mb-0">Apply More Referal Coupon</h6>                

    <div class="PriceDetails_wrapper mt-1 flex">
        <input type="text" name="apply_referal_coupon" class="form-control" id="apply_referal_coupon"/>
        <span class="coupon_error" style="color: red"></span>
        <button type="button"
            class="border bg-yellow-400 text-basic text-white 
        font-semibold mt-1 p-3 w-[45%] focus:outline-none active:outline-none"
            id="apply-referal-coupon-btn">            
            APPLY COUPON <span class="spinner hidden"><i class="icofont-spinner-alt-1"></i></span>
        </button>
    </div>

    <div class="flex  p-1 w-[100%] mt-2  referal_coupon_applied">
        <span class="text-black p-2 referal-text">COUPON  {{ $sessionArray['coupon_name'] }}  Applied</span>
    </div>


    <div class="text-center mt-4">
        <input type="button" id="payment_tab_forward_btn"
            class="btn bg-green-400 border text-white border-green-500" value="Save & Next">
    </div>

</div>

@else

<div class="p-3 bg-light mb-3 mt-4 referal_coupon_box hidden">
    <h6 class="apply_coupon_title font-size-16 mb-0">Apply More Referal Coupon</h6>                

    <div class="PriceDetails_wrapper mt-1 flex referal_input_box">
        <input type="text" name="apply_referal_coupon" class="form-control" id="apply_referal_coupon"/>
        <span class="coupon_error" style="color: red"></span>
        <button type="button"
            class="border bg-yellow-400 text-basic text-white 
        font-semibold mt-1 p-3 w-[45%] focus:outline-none active:outline-none"
            id="apply-referal-coupon-btn">            
            APPLY COUPON <span class="spinner hidden"><i class="icofont-spinner-alt-1"></i></span>
        </button>
    </div>


    <div class="flex  p-1 w-[100%] mt-2 hidden referal_coupon_applied">
        <span class="text-black p-2 referal-text">CODE 10</span>
    </div>

    <div class="text-center mt-4">
        <input type="button" id="payment_tab_forward_btn"
            class="btn bg-green-400 border text-white border-green-500" value="Save & Next" disabled>
    </div>

</div>
@endif