
@php

$report_urls =explode(',',$record['report_url'])

@endphp

@foreach($report_urls as $url)

<a href="{{ asset('/public/Image/'.$url)}}" download>
    <i class="bi bi-download"></i> Download Report</a> &nbsp;

    <i class="bi bi-trash"></i>

 @endforeach   

 
    <button id="uploadButton">Upload File</button>

                <!-- Hidden file input -->
    <div id="report" style="display: none;">            
    <input type="file" id="newReport"  data-id="{{$record['id']}}">
 
    </div>
