<div class="flex flex-col md:flex-row p-2">
    @foreach ($addresses as $address)
        <div class="w-full md:w-1/3 border flex flex-col mt-2 mr-2">
            <div class="border-b-2 w-full p-3">
                <h3 class="text-black text-base font-semibold">{{ $address->name }}</h3>
            </div>

            <div class="w-full p-3">
                <address>
                    <h3 class="text-black text-base font-semibold"> Address: </h3>
                    <p> {{ $address->address1 }}</p>
                    <span>{{ $address->city }}, {{ $address->state }},
                        {{ $address->zip }}
                </address>
            </div>

            <div class="w-full p-2">
                <h3 class="text-black text-base font-semibold">Phone: {{ $address->phone }}</h3>
            </div>

            <div class="w-full p-2">
                <h3 class="text-black text-base font-semibold">Email: {{ $address->email }}</h3>
            </div>

            <div class="w-full flex justify-between p-2">

                <a href="{{ route('address.edit', $address->id) }}">
                    <button
                        class="btn btn-success  border text-black border-green-400 hover:bg-green-400  hover:text-white mr-2"
                        type="button">Edit</button>
                </a>

                <button class="btn btn-main-2 btn-full-round remove_address_btn" type="button"
                    value="{{ $address->id }}">Delete</button>
            </div>
        </div>


        {{-- <div class="booking-container">
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
</div> --}}
    @endforeach

</div>
