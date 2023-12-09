<div class="w-full md:w-1/4 p-4 bg-gray-100 h-full">
    <div class="md:block w-full mb-4 border-b-2 pb-4 hidden">
        <div class="advertise p-0 flex flex-col border border-green-400">
            <img src="{{asset('images/bg/2023093004156.png')}}" class="w-full"/>
            <p class="text-basic text-black p-3 text-center">Manage Diabetis with CALLLABS exclusive packages!<br/>

                Track glucose values and insights regularly.
            </p>
            <button class="border p-3 text-xl text-white font-semibold border-green-500 bg-green-400">
                Try it now
            </button>
        </div>    
        {{-- <img src="{{ asset('images/about/Banner.png') }}" alt="Sample" class="w-full h-full object-cover rounded" /> --}}
    </div>
    

    <div class="mb-4 border-b-2 pb-4 hidden md:block" id="filterDropdown">
        <h3 class="text-xl font-semibold mb-2">Tags</h3>
          <div class="flex flex-wrap mb-2">
              @foreach ($organs as $organ)
                  <div class="bg-white-500  border text-black px-2 py-1 rounded mr-2 mb-2">
                      {{ $organ->name }}
                  </div>
              @endforeach
              <div class="bg-white-500 border text-black px-2 py-1 rounded mr-2 mb-2">
                  Kidney
              </div>
          </div>
    </div>

    <div class="hidden lg:block">
        <h3 class="text-xl font-semibold mb-2">Options</h3>
        <div class="mb-2">
            <label class="flex items-center mb-1">
                <input type="checkbox" class="form-checkbox mr-2" />
                Checkbox 1
            </label>
            <label class="flex items-center mb-1">
                <input type="checkbox" class="form-checkbox mr-2" />
                Checkbox 2
            </label>
        </div>
    </div>
</div>
