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
                            <th class="border-top-0" style="width: 110px;" scope="col">Test/Package</th>
                            <th class="border-top-0" scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0 @endphp
                        @foreach ($items as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <tr>
                                <td>
                                    <h5 class="font-size-16 text-truncate">
                                        <a href="#" class="text-dark">
                                            {{$details['type'] === 'package'?ucfirst($details['name']):ucfirst(implode(',', $details['name']))}}
                                        </a>
                                    </h5>
                                    <p class="text-muted mb-0">
                                        <b>Lab -</b> {{ ucfirst($details['lab_name']) }}
                                    </p>
                                    <p class="text-muted mb-0 mt-1"></p>

                                </td>

                                <td>₹{{ $details['price'] }}/-</td>
                            </tr>
                        @endforeach


                        <tr>
                            <td colspan="1">
                                <h5 class="font-size-14 m-0">Sub Total :</h5>
                            </td>
                            <td>
                                ₹{{ $total }}/-
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
                                ₹{{ $total }}/-
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>

            <div class="p-3 bg-light mb-3 mt-4">
                <h5 class="font-size-16 mb-0">Payment<span class="float-end ms-2"></span></h5>

                <div class="col-lg-12 col-sm-12 mb-2 mt-4">
                    <div data-bs-toggle="collapse">
                        <label class="card-radio-label mb-0">
                           <div class="card-radio text-truncate p-3" style="display: inline-flex">
                                {{-- <span class="fs-14 mb-2 d-block">Razorpay</span> --}}

                                <img src="{{asset('images/service/Razorpay-removebg.png')}}" class="img-responsive razoprpayimg"  />
                            </div>
                        </label>
                        <div class="edit-btn rounded" style="margin-top: -60px">
                            <input type="radio" name="pay_option" id="patient"
                            class="card-radio-input" style="display: block; height:30px" value="1">
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12 mb-2 mt-4">
                    <div data-bs-toggle="collapse">
                        <label class="card-radio-label mb-0">
                           <div class="card-radio text-truncate p-3">
                                <span class="fs-14 mb-2 d-block">Cash on Sample Pickup</span>
                            </div>
                        </label>
                        <div class="edit-btn rounded">
                            <input type="radio" name="pay_option" id="patient"
                            class="card-radio-input" style="display: block; height:30px" value="2">

             
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
