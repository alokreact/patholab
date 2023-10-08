
@foreach ($addresses as $address)
<div class="booking-container">
    <div class="booking-box">
        <div class="booking-box_top">
            <h3>Name: <span>{{ $address->name }}</span></h3>

            <h3>Phone: <span>{{ $address->email }}</span></h3>

            <h3>Phone: <span>{{ $address->phone }}</span></h3>

        </div>

        <div class="booking_collectionDetails">
            <h3>Address :</h3>
            <div class="collectionDetails_info">
                <div class="collectionDetails_info_dateTime">
                    <p> {{ $address->address1 }}</p>
                    <span>{{ $address->city }}, {{ $address->state }},
                        {{ $address->zip }}
                    </span>

                </div>
            </div>
        </div>


        <div class="bookingCard__buttons">
            <a href="{{route('address.edit',$address->id)}}">
                <button class="btn btn-success  btn-full-round mr-2"
                type="button">Edit</button>
            </a>

         
                <button class="btn btn-main-2 btn-full-round remove_address_btn"
                type="button" value="{{ $address->id}}">Delete</button>
            
        </div>
    </div>
</div>
@endforeach
