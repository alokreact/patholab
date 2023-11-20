<form action="{{ route('payment.callback') }}" method="POST" id="payment-form">
    @csrf
    <input type="hidden" name="razorpay_order_id" value="{{ $response['razorpayOrderId'] }}">
    <input type="hidden" id="razorpay_payment_id" name="razorpay_payment_id">
    <input type="hidden" id="razorpay_signature" name="razorpay_signature">
  
    <input type="hidden" id="address" name="address" value="{{$response['user_address'] }}">
    
    <input type="hidden" id="patient" name="patient" value="{{$response['patient'] }}">
    <input type="hidden" id="recieptId" name="recieptId" value="{{$response['recieptId'] }}">

    <input type="hidden" id="slot_day" name="slot_day" value="{{$response['order_date'] }}">
    <input type="hidden" id="slot_time" name="slot_time" value="{{$response['collection_time'] }}">

    <input type="hidden" id="user_id" name="address" value="{{$response['user_id'] }}">
    
    <button type="submit" id="pay-button" style="display: none">Pay Now</button>
</form>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    var options = {
        "key": "{{ env('RAZORPAY_KEY') }}", // Enter the Key ID generated from the Dashboard
        "amount": "{{ $response['total'] }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "INR",
        "name": "CALL LABS",
        "description": "Test Transaction",
        "image": "http://calllabs.in/images/Logo-removebg.png",
        "order_id": "{{ $response['razorpayOrderId'] }}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "callback_url": "{{ route('confirmation') }}",
        "handler": function(response) {
            alert(response);
            // alert(response.razorpay_signature);

            document.getElementById('razorpay_signature').value = response.razorpay_signature;
            document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
            document.getElementById('payment-form').submit();
            console.log(response)
        },
        "prefill": {
            "name": "{{ $response['user_name'] }}",
            "email": "{{ $response['user_email'] }}",
            "contact": "{{ $response['user_phone'] }}"
        },
        "notes": {
            "address": "{{ $response['user_address'] }}"
        },
        "theme": {
            "color": "#3399cc"
        },
        "modal": {
            ondismiss: function() {
                window.location.href = "{{ route('payment.failed') }}";
                // Handle payment window closure here, e.g., show an error message to the user
                alert('Payment window closed. Please try again to complete the payment.');
            }
        }
    };


    var rzp1 = new Razorpay(options);
    rzp1.open();

    rzp1.on('payment.failed', function(response) {
        console.log('trrrw', response)
        // alert(response.error.code);
        // alert(response.error.description);
        // alert(response.error.source);
        // alert(response.error.step);
        // alert(response.error.reason);
        // alert(response.error.metadata.order_id);
        // alert(response.error.metadata.payment_id);
    });

    rzp1.on('payment.authorized', function(response) {
        //alert(response);
        // console.log('response',response);return;
    });
</script>
