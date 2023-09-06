<form action="{{route('payment.callback')}}" method="POST" id="payment-form">
    @csrf
    <input type="hidden" name="razorpay_order_id" value="{{ $response['orderId'] }}">
    <input type="hidden" id="razorpay_payment_id" name="razorpay_payment_id" >
    <input type="hidden" id="razorpay_signature" name="razorpay_signature" >

    <button type="submit" id="pay-button">Pay Now</button>
</form>


<button id="rzp-button1" style="display:none">Pay</button>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    // console.log('response',response)
    var options = {
        "key": "{{env('RAZORPAY_KEY')}}", // Enter the Key ID generated from the Dashboard
        "amount": "{{$response['total']}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "INR",
        "name": "{{$response['user_name']}}",
        "description": "Test Transaction",
        "image": "https://example.com/your_logo",
        "order_id": "{{$response['orderId']}}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "callback_url": "{{route('confirmation')}}",
        "handler": function(response) {
           // alert(response.razorpay_payment_id);
           // alert(response.razorpay_signature);

            document.getElementById('razorpay_signature').value = response.razorpay_signature;

            document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;

            document.getElementById('payment-form').submit();
            console.log(response)
        },
        "prefill": {
            "name": "{{$response['user_name']}}",
            "email": "{{$response['user_email']}}",
            "contact": "{{$response['user_phone']}}"
        },
        "notes": {
            "address": "{{$response['user_address']}}"
        },
        "theme": {
            "color": "#3399cc"
        }
    };


    window.onload = function() {

        document.getElementById('rzp-button1').click();
        console.log('click')
    }

    var rzp1 = new Razorpay(options);

    document.getElementById('rzp-button1').onclick = function(e) {
        rzp1.open();
        //e.preventDefault();
    }
    rzp1.on('payment.failed', function(response) {
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
    });

    rzp1.on('payment.authorized', function(response) {
        alert(response);
        // console.log('response',response);return;
    });
</script>