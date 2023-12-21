<li class="checkout-item">
    <div class="avatar checkout-icon p-1">
        <div class="avatar-title rounded-circle  bg-green-400 text-white">
            4
        </div>
    </div>

<div class="p-3 bg-light mb-3 mt-4">
    <h6 class="PriceDetails_head font-size-16 mb-0">Payment</h6>
    <div class="PriceDetails_wrapper">
        <div class="PriceDetails_details card-radio">
            <p style="margin: 0px">
                <img src="{{ asset('images/service/razorpay.png') }}"
                    class="img-responsive razoprpayimg" />
            </p>
            <span>
                <div class="edit-btn rounded" style="margin-top:-15px">
                    <input type="radio" name="pay_option" id="patient" class="card-radio-input"
                        style="display:block;height:30px" value="1">
                </div>
            </span>
        </div>

        <div class="PriceDetails_details card-radio mt-4">
            <p style="margin: 0px" class="text-2xl">Pay by Cash/Card</p>
            <span style="font-weight:400;">
                <div class="edit-btn rounded" style="margin-top: -15px">
                    <input type="radio" name="pay_option" id="patient" class="card-radio-input"
                        style="display: block; height:30px" value="2">
                </div>
            </span>
        </div>
    </div>
</div>