<section class="section clients">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title text-center">
					<h2>Partners who support us</h2>
					<div class="divider mx-auto my-4"></div>
			 	</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row clients-logo">
        @forelse ($labs as $lab )
            
      		<div class="col-lg-6">
				<div class="client-thumb">
					<img src="{{asset('Image/'.$lab->image)}}" alt="" class="img-fluid">
					<br/>
			 	</div>
			</div>

        @empty
            <p>No Labs</p>
         @endforelse
		
    
		</div>
	</div>
</section>