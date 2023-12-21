@if(session()->has('coupon_data'))



@else

@foreach ($products as $id => $details)
    <tr>
        <td style="max-width: 240px">
            <h5 class="font-size-16 text-truncate">
                <a href="#" class="text-dark">
                    {{ ucfirst($details->package_name) }}
                </a>
            </h5>
            <p class="text-muted mb-0"><b>Lab -</b> {{ $details->getLab->lab_name }}</p>
            <p class="text-muted mb-0 mt-1"></p>
        </td>
        <td>₹{{ $details->price }}/-</td>
    </tr>
@endforeach
    <tr>
        <td colspan="1"><h5 class="font-size-14 m-0">Sub Total :</h5></td>
        <td>{{ $total }}</td>
    </tr>

    <tr>
        <td colspan="1"><h5 class="font-size-14 m-0">Estimated Tax :</h5>
        </td>
        <td>0%</td>
    </tr>

    <tr class="bg-light">
        <td colspan="1">
            <h5 class="font-size-14 m-0">Total:</h5>
        </td>
        <td id="total">{{ $total }}</td>

        <div class="mt-2 applied_coupon_box">
            <div class="flex border p-1 w-[100%] mt-2">
                <span class="text-black p-2">FREE10 </span>
                <i class="icofont-close-line-squared-alt"></i>
            </div>
        </div>
    </tr>
@endif