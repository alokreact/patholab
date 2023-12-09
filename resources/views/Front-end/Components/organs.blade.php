<section class="section clients">
	<div class="container">
		<div class="flex justify-between items-center">
            <div class="section-title">
                <h2 class="font-mediom text-xs md:text-2xl underline">Find test by organs, Conditions and Lifestyle disorders</h2>
            </div>

            
             <div class="space-x-4 lg:mt-0 mt-2">
				<a href="{{route('allorgans')}}">
                <button class="border border-green-500 w-[120px]  rounded-full p-2 text-black hover:scale-110 hover:bg-green-500 hover:text-white">View All</button>
				</a>
			</div>
        </div>
	
	{{-- <a href="{{route('allorgans')}}">
		<button class="btn btn-success btn-round-full viw-all" style="float:right; margin-right:45px;margin-top:-30px">View All</button></a>	 --}}
	
		{{-- //organs --}}

	<div class="container">	
		<div class="row organs">
			@forelse ($organs as $organ)
				
			
			<div class="flex  items-center p-4 mt-2 flex-col">
			
					<div class="flex w-32 h-32 bg-cover justify-center rounded-full items-center p-6 hover:scale-105 organ">
						<a href="{{route('testbyorgan',$organ->id)}}">
							<img src="{{asset('Image/'.$organ->image)}}"class='w-24 h-24 object-cover'/>
						</a>
						</div>

					<div class="flex justify-center mt-1">
						<h4 class="text-xs text-black">{{$organ->name}}</h4>

						
					</div>

				 </div>	   
				 
				 @empty
				
			
			@endforelse

         
		</div>
	</div>
</section>