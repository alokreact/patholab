@foreach ($patients as $patient)
    <div class="booking-container">
        <div class="booking-box">
            <div class="booking-box_top">
                <h3>Name: <span>{{ $patient->name }}</span></h3>


            </div>

            <div class="booking_collectionDetails">
                <div class="collectionDetails_info">
                    <div class="collectionDetails_info_dateTime">
                        <p> Age - {{ $patient->age }}</p>
                        <span>Gender - {{ $patient->gender }}
                        </span>

                    </div>
                </div>
            </div>


            <div class="bookingCard__buttons">
                <a href="{{ route('patient.edit', [$patient->id]) }}">
                    <button class="btn btn-success  btn-full-round mr-2" type="button">Edit</button>
                </a>
                <a href="#" class="delete_patient" data-id="{{ $patient->id }}">
                    <button class="btn btn-main-2 btn-full-round" type="button">Delete</button>
                </a>


            </div>
        </div>
    </div>
@endforeach
