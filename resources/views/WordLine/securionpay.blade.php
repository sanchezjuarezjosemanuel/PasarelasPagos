<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Securionpay</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div id="payment-error" class="alert alert-danger hidden"></div>
        <form action="{{ route('paymentsecurionpay') }}" method="post" id="payment-form" class="form-horizontal card" style="width: 50rem;">
            @csrf
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">
                    Card number
                </label>
                <input type="hidden" name="amount" value="300000">
                <input type="hidden" name="currency" value="EUR">
                <div class="col-sm-9">
                    <input data-securionpay="number" class="form-control" type="text" name="numbre" maxlength="16">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">
                    Expiration
                </label>
                <div class="col-sm-1 col-md-1 col-lg-1 expiration">
                    <input data-securionpay="expMonth" class="form-control" type="text" placeholder="MM" size="2" name="MM" maxlength="2" max="12">
                </div>
                <div class="col-sm-1 col-md-1 col-lg-1 expiration">
                    <input data-securionpay="expYear" class="form-control" type="text" placeholder="YY" size="2" name="YY" maxlength="4" min="22">
                </div>

                <label class="col-sm-1  col-form-label">
                    cvc
                </label>
                <div class="col-sm-1 col-md-1 col-lg-1 expiration">
                    <input data-securionpay="cvc" class="form-control" type="text" size="4" maxlength="4" name="cvc">
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-3 col-sm-9">
                    <br>
                    <button type="submit" class="btn btn-primary ">$12.00</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
