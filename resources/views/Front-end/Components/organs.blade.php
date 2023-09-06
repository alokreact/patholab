<section class="section clients">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title text-center">
					<h2>Find test by organs, Conditions and Lifestyle disorders</h2>
					<div class="divider mx-auto my-4"></div>
		 		</div>
			</div>
		</div>
	</div>
	
	<a href="{{route('allorgans')}}">
		<button class="btn btn-success btn-round-full viw-all" style="float:right; margin-right:45px;margin-top:-30px">View All</button></a>	
	
	<div class="container">	
		<div class="row organs">
			@php  $i=0;  @endphp
			@forelse ($organs as $organ)
			<a href="{{route('testbyorgan',$organ->id)}}">
			 	<div class="card" style="padding: 5px 35px">
					  <div class="organ-circle">
						{{--<i class="fa fa-star"></i> --}}
						<img src="{{asset('Image/'.$organ->image)}}"/>
					  </div>
					  <div class="card-body">
						<h5 class="card-title">{{$organ->name}}</h5>
					  </div>
				</div>	   
			</a>
				@empty
			<p></p>
			@endforelse

         

		</div>
	</div>
</section>