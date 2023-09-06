<li class="checkout-item">
    <div class="avatar checkout-icon p-1">
        <div class="avatar-title rounded-circle bg-primary">
            <i class="bx bxs-receipt text-white font-size-20"></i>
        </div>
    </div>
    <div class="feed-item-list">
        <div>
            <h5 class="font-size-16 mb-1">Billing Info</h5>
            <p class="text-muted text-truncate mb-4">Add Address</p>
            <div class="mb-3">
                <form id="checkout-form" action={{route('checkout.submit')}} method="POST">
                    @csrf
                    <div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label" for="billing-name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Enter name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label" for="billing-email-address">Email
                                        Address</label>
                                    <input type="email" class="form-control"
                                        id="billing-email-address" name ="email" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label" for="billing-phone">Phone</label>
                                    <input type="text" class="form-control"
                                        id="billing-phone" placeholder="Enter Phone no." name="phone">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="billing-address">Address</label>
                            <textarea class="form-control" id="address" rows="3" placeholder="Enter full address" name="address"></textarea>
                        </div>

                        <div class="row">
                        
                            <div class="col-lg-4">
                                <div class="mb-4 mb-lg-0">
                                    <label class="form-label" for="billing-city">City</label>
                                    <input type="text" class="form-control" id="billing-city"
                                        placeholder="Enter City" name="city">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-0">
                                    <label class="form-label" for="zip-code">Zip / Postal
                                        code</label>
                                    <input type="text" class="form-control" id="zip-code"
                                        placeholder="Enter Postal code" name="zip">
                                </div>
                            </div>
                        </div>
                    </div>

               
            </div>
        </div>
    </div>
</li>