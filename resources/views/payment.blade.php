
<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
</head>
<body>
    <form action="https://franchise-hexamed.com/public/franchise/transactionsuccess" method="POST">
        @csrf
        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="{{ config('razorpay.key') }}"
            data-amount="{{ $order->amount }}"
            data-currency="INR"
            data-order_id="{{ $order->id }}"
            data-buttontext="Pay with Razorpay"
            data-name="Hexamed"
            data-description="Payment"
            data-image="https://franchise-hexamed.com/public/assets/img/hexamedlogo.png"
            data-prefill.name="{{\Auth::user()->id}}"
            data-prefill.email="customer@example.com"
            data-theme.color="#F37254"
        ></script>
    </form>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Select the button by its ID
    var button = document.querySelector('.razorpay-payment-button');
    
    // Simulate a click on the button
    button.click();
    var options = {
        "key": "{{ config('razorpay.key') }}",
        "amount": "{{ $order->amount }}",
        "currency": "INR",
        "order_id": "{{ $order->id }}",
        "handler": function (response){
             document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
            document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
            document.getElementById('razorpay_signature').value = response.razorpay_signature;
            
            document.querySelector('form').submit();
        },
        "modal": {
            "ondismiss": function(){
                window.location.href = "{{ route('home') }}";
            }
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();
});

    </script>
</html>