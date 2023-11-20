@extends('Front-end.layout.mainlayout')
@section('content')
    <div class="container mx-auto justify-center">
        <div class="flex p-3">
            <img src="{{ asset('images/bg/404ErrorPage.png') }}"/>
        </div>

		<a href="{{ route('home') }}" class="link_404 mt-2 flex mx-auto justify-center mb-2">
				<button class="border p-3 border-green-400 text-black text-xl font-semibold">
					Go to Home</button>
		</a>
		
    </div>
@endsection
