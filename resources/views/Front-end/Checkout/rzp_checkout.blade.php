<form action="/payment/callback" method="POST" id="payment-form">
    @csrf
    <input type="hidden" name="razorpay_order_id" value="{{ $response['orderId'] }}">

    <button type="submit" id="pay-button">Pay Now</button>
</form>


<script
src="https://checkout.razorpay.com/v1/checkout.js"
data-key="{{ env('RAZORPAY_KEY') }}"
data-amount="{{ $response['total'] }}"
data-order_id="{{ $response['recieptId'] }}"
data-buttontext="Pay Now"
data-name="CALL LABS"
data-description="Payment Description"
data-image="http://calllabs.in/images/Logo-removebg.png"
data-prefill.name="{{$response['user_name']}}"
data-prefill.email="{{$response['user_email']}}"
data-theme.color="#F37254"
></script>


<script>
    document.getElementById('pay-button').addEventListener('click', function (e) {
        // Prevent the default form submission
        e.preventDefault();
        
        // Trigger Razorpay payment modal
        var rzp = new Razorpay({
            key: '{{ env('RAZORPAY_KEY') }}',
            amount: {{ $response['total'] }},
            currency: 'INR',
            name: 'CALL LABS',
            description: 'Payment Description',
            image: 'http://calllabs.in/images/Logo-removebg.png',
            prefill: {
                name: '{{$response['user_name']}}',
                email: '{{$response['user_email']}}',
            },
            theme: {
                color: '#F37254'
            },
            handler: function (response) {
                // This callback function will be called after payment success
                // You can choose to submit the form here or perform other actions
                // For now, let's submit the form
                document.getElementById('payment-form').submit();
            }
        });

        rzp.open();
    });
</script>
