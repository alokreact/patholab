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
                        class="border p-2 text-black border-green-400 hover:bg-green-400  hover:text-white mr-2"
                        type="button"><i class="icofont-edit"></i></button>
                </a>

                <button class="p-2 border remove_address_btn" type="button"
                    value="{{ $address->id }}"><i class="icofont-ui-delete"></i></button>
            </div>
        </div>


          
    @endforeach

</div>
