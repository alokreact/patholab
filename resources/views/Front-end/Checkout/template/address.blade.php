<li class="checkout-item">
    <div class="avatar checkout-icon p-1">
        <div class="avatar-title rounded-circle bg-green-400 text-white">
            1
        </div>
    </div>

    <div class="feed-item-list">
        <div>
            <h5 class="font-size-16 mb-1">Select Address:</h5>

            <a href="{{ route('address.create') }}">
                <input type="button" class="btn btn-success border text-black border-green" value="+" style="float: right" />
            </a>

            <div class="mb-3">
                @if (count($addresses) > 0)
                    <div class="row" id="address-list">
                        @foreach ($addresses as $address)
                            <div class="col-lg-6 col-sm-6 mb-2 patient-div">
                                <div data-bs-toggle="collapse">
                                    <label class="card-radio-label mb-0">

                                        <input type="radio" name="address" id="address" class="card-radio-input"
                                            value="{{ $address->id }}">

                                        <div class="card-radio text-truncate p-3">
                                            <span class="fs-14 mb-2 d-block">Name - {{ ucfirst($address->name) }}</span>

                                            <span class="text-muted fw-normal text-wrap mb-1 d-block">Email -
                                                {{ $address->email }}</span>
                                            <span class="text-muted fw-normal text-wrap mb-1 d-block">Phone -
                                                {{ $address->phone }}</span>

                                            <span class="text-muted fw-normal d-block">
                                                Address:
                                                <Address>{{ ucfirst($address->address1) }}</Address>
                                                <Address>{{ ucfirst($address->city), ucfirst($address->zip) }}</Address>

                                            </span>
                                        </div>
                                    </label>

                                    <div class="action_box">
                                        <div class="edit-btn bg-light  rounded">

                                            <a href="{{ route('address.edit', [$address->id]) }}" class=""
                                                data-id="{{ $address->id }}">
                                                <i class="icofont-edit"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                     
                    </div>
                @else
                @endif

                <div class="col" style="display: flex;place-content: end">
                    <div class="text-end mt-2 mt-sm-0">
                        <input type="submit" id="nextTab" class="btn btn-success border border-green-500 text-black" value="Proceed">
                    </div>
                </div>
            </div>
        </div>
</li>
