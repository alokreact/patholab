@extends('Front-end.layout.mainlayout')

<style>

.page_404{ padding:40px 0; background:#fff; font-family: inherit;
}

.page_404  img{ width:100%;}

.four_zero_four_bg{
 
 	background-image: url('images/404.jpg');
    height: 500px;
    background-position: center;
 }
 
 
 .four_zero_four_bg h1{
 font-size:80px;
 }
 
  .four_zero_four_bg h3{
			 font-size:80px;
			 }
			 
			 .link_404{			 
	color: #fff!important;
    padding: 10px 20px;
    background: #39ac31;
    margin: 20px 0;
    display: inline-block;}
	.contant_box_404{ margin-top:-50px;}
</style>
@section('content')


<section class="page_404">
	<div class="container">
		<div class="row">	
		<div class="col-sm-12 ">
		<div class="col-sm-10 col-sm-offset-1  text-center">
		<div class="four_zero_four_bg">
			{{-- <h1 class="text-center ">404</h1>
		 --}}
		
		</div>
		
		<div class="contant_box_404 mt-120" style="margin-top: 30px">
		<h3 class="h2">
		Look like you're lost
		</h3>
		
		<p>the page you are looking for not avaible!</p>
		
		<a href="{{route('home')}}" class="link_404">Go to Home</a>
	</div>
		</div>
		</div>
		</div>
	</div>
</section>
@endsection