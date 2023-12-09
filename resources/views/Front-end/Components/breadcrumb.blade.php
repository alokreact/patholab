<nav class="flex  mb-2 mt-0" aria-label="Breadcrumb">
    @foreach($breadcrumbs as $breadcrumb)
    @if(isset($breadcrumb['url']))
        <span class="text-gray-500 text-xs mx-2"><i class="icofont-home"></i>
            <a href="{{ $breadcrumb['url'] }}" class="text-black-500 text-xs font-semibold hover:underline mx-2">
                {{ $breadcrumb['label'] }}</a>
        </span>
          

        {{-- <li class="breadcrumb-item"><a href=""></a></li> --}}
    @else
        {{-- <li class="breadcrumb-item active" aria-current="page"></li> --}}
 
        <span class="mx-2 text-xs"> <i class="icofont-rounded-right"></i> </span>
        <a href="#" class="text-black-500 text-xs font-semibold hover:underline mx-2">{{ $breadcrumb['label'] }}</a>                
    @endif
@endforeach



 
</nav>
