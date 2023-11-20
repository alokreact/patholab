<div class="flex flex-col md:flex-row p-2">
    @foreach ($patients as $patient)
        <div class="w-full md:w-1/3 border flex flex-col mt-2 mr-2">
            <div class="border-b-2 w-full p-3">
                <h3 class="text-black text-base font-semibold">Name: <span>{{ $patient->name }}</span>
                </h3>
            </div>

            <div class="w-full p-2">
                <h3 class="text-black text-base font-semibold">Age - {{ $patient->age }}</h3>
            </div>

            <div class="w-full p-2">
                <h3 class="text-black text-base font-semibold">Gender - {{ $patient->gender === 1 ? 'Male' : 'Female' }}
                </h3>
            </div>

            <div class="w-full flex justify-between p-2">
                <a href="{{ route('patient.edit', [$patient->id]) }}">
                    <button class="p-2 border text-black border-green-400 hover:bg-green-400  hover:text-white mr-2"
                        type="button"><i class="icofont-edit"></i></button>
                </a>
                <button class="p-2 border delete_patient" type="button" value="{{ $patient->id }}"><i
                        class="icofont-ui-delete"></i></button>
            </div>

        </div>
    @endforeach
</div>
