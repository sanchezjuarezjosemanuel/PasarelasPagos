<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>My Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Available at https://github.com/globalpayments -->
        <script src="{{ asset('js/rxp-js.js') }}"></script>
        <!-- Basic form styling given as an example -->
        <style type="text/css">
            label{display:block; font-size:12px; font-family:arial;}
            input{width:200px;}
            input.small{width:50px;}
            .twoColumn{float:left;margin:0 30px 20px 0;}
            .clearAll{clear:both;}
        </style>
    </head>
<body>
    <form name="myForm" method="POST" autocomplete="off" action="">
        <label for="cardNumber">Card Number</label>
        <input type="tel" id="cardNumber" name="card-number" /><br><br>
        <label for="cardholderName">Cardholder Name</label>
        <input type="text" id="cardholderName" name="cardholder-name" /><br><br>
        <p class="twoColumn">
        <label>Expiry Date</label>
        <input type="tel" id="expiryDateMM" name="expiry-date-mm" placeholder="MM" class="small" />
        <input type="tel" id="expiryDateYY" name="expiry-date-yy" placeholder="YY" class="small"  /></p>
        <p class="twoColumn">
        <label for="cvn">Security Code</label>
        <input type="tel" id="cvn" name="cvn" class="small" /></p>
        <p class="clearAll">
            <button type="button" onclick="validate();">Pay Now</button>
    </form>
</body>
<script>
    const token ="{{csrf_token()}}"
</script>
<script src="{{asset('js/validacion.js')}}"></script>
</html>
