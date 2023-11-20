<style>
    .PriceDetails_wrapper {
        border-bottom: 1px solid #d9d9d9;
        border-radius: 15px;
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding-top: 20px
    }

    .PriceDetails_details {
        display: flex;
        padding: 25px;
        align-items: center;
        justify-content: space-between;
        font-weight: 600;
        font-size: 14px;
        line-height: 18px;
        color: #2f3032;
        font-style: italic;
    }
</style>

<div class="col-xl-4">

    <div class="card checkout-order-summary">

        <div class="card-body">
            <div class="p-3 bg-light mb-3">
                <h5 class="font-size-16 mb-0">Bill Summary<span class="float-end ms-2"></span></h5>
            </div>

            <div class="table-responsive">
                <table class="table table-centered mb-0 table-nowrap">
                    <thead>
                        <tr>
                            <th class="border-top-0" style="width: 330px;" scope="col">
                                {{ $type[0] === 'test' ? 'Test' : 'Package' }}</th>
                            <th class="border-top-0" scope="col">Price</th>
                        </tr>
                    </thead>

                    @if ($type[0] === 'test')

                        <tbody>
                            @php $total = 0 @endphp

                            @foreach ($cartItems as $id => $details)
                                <tr>
                                    <td style="max-width: 240px">
                                        <h5 class="font-size-16 text-truncate">
                                            <a href="#" class="text-dark">

                                                @foreach ($product_names as $name)
                                                    {{ $name }},
                                                @endforeach
                                            </a>
                                        </h5>
                                        <p class="text-muted mb-0">
                                            <b>Lab -</b> {{ ucfirst($details->name) }}
                                        </p>
                                        <p class="text-muted mb-0 mt-1"></p>
                                    </td>

                                    <td>₹{{ $details->price }}/-</td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="1">
                                    <h5 class="font-size-14 m-0">Sub Total :</h5>
                                </td>
                                <td>
                                    ₹{{ $details->price }}/-
                                </td>
                            </tr>

                            <tr>
                                <td colspan="1">
                                    <h5 class="font-size-14 m-0">Estimated Tax :</h5>
                                </td>
                                <td>
                                    0%
                                </td>
                            </tr>

                            <tr class="bg-light">
                                <td colspan="1">
                                    <h5 class="font-size-14 m-0">Total:</h5>
                                </td>
                                <td>
                                    ₹{{ $details->price }}/-
                                </td>
                            </tr>

                        </tbody>
                    @else
                        @foreach ($products as $id => $details)
                            <tr>
                                <td style="max-width: 240px">
                                    <h5 class="font-size-16 text-truncate">
                                        <a href="#" class="text-dark">
                                            {{ ucfirst($details->package_name) }}
                                        </a>
                                    </h5>
                                    <p class="text-muted mb-0">
                                        <b>Lab -</b> {{ $details->getLab->lab_name }}
                                    </p>
                                    <p class="text-muted mb-0 mt-1"></p>
                                </td>

                                <td>₹{{ $details->price }}/-</td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="1">
                                <h5 class="font-size-14 m-0">Sub Total :</h5>
                            </td>
                            <td>

                                {{ $total }}

                            </td>
                        </tr>

                        <tr>
                            <td colspan="1">
                                <h5 class="font-size-14 m-0">Estimated Tax :</h5>
                            </td>
                            <td>
                                0%
                            </td>
                        </tr>

                        <tr class="bg-light">
                            <td colspan="1">
                                <h5 class="font-size-14 m-0">Total:</h5>
                            </td>
                            <td>
                                {{ $total }}

                            </td>
                        </tr>

                    @endif
                </table>
            </div>


            <div class="p-3 bg-light mb-3 mt-4">
                <h6 class="PriceDetails_head font-size-16 mb-0">Apply Coupon</h6>
                <div class="PriceDetails_wrapper">
                    <input type="text" name="apply_coupon" class="form-control" id="apply_coupon"/>
                </div>
                <button type="button" class="border bg-yellow-700 text-basic text-white font-semibold mt-3 p-3">APPLY COUPON</button>
           
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
                                    style="display: block; height:30px" value="1">
                            </div>
                        </span>
                    </div>


                    <div class="PriceDetails_details card-radio">
                        <p style="margin: 0px">Pay by Cash/Card</p>
                        <span style="font-weight: 400;">
                            <div class="edit-btn rounded" style="margin-top: -15px">
                                <input type="radio" name="pay_option" id="patient" class="card-radio-input"
                                    style="display: block; height:30px" value="2">
                            </div>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
