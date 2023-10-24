<section class="section clients">
	<div class="container">
		<div class="flex justify-between items-center">
            <div class="section-title">
                <h2 class="font-mediom text-2xl underline">Find test by organs, Conditions and Lifestyle disorders</h2>
            </div>

            
             <div class="space-x-4 lg:mt-0 mt-2">
				<a href="{{route('allorgans')}}">
                <button class="border border-green-500 w-[120px]  rounded-full p-2 text-black hover:scale-110 hover:bg-green-500 hover:text-white">View All</button>
				</a>
			</div>
        </div>
	
	{{-- <a href="{{route('allorgans')}}">
		<button class="btn btn-success btn-round-full viw-all" style="float:right; margin-right:45px;margin-top:-30px">View All</button></a>	 --}}
	
	<div class="container">	
		<div class="row organs">
			@php  $i=0;  @endphp
			@forelse ($organs as $organ)
			<a href="{{route('testbyorgan',$organ->id)}}">
				<div class="flex justify-around p-4 mt-2">
					<div class="flex w-32 h-32 bg-cover rounded-full items-center p-6 hover:scale-105 organ">
					<img src="{{asset('Image/'.$organ->image)}}"class='w-24 h-24 object-cover'/>
					</div>

				 </div>	   
			</a>
				@empty
			<p></p>
			@endforelse

         

		</div>
	</div>
</section>