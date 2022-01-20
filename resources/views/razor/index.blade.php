<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Integrando Razorpay</title>
    <meta name="csrf-tokent" content="{{csrf_token()}}">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> {{ $message }}
                    </div>
                @endif
                {!! Session::forget('error') !!}
                @if($message = Session::get('success'))
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Success!</strong> {{ $message }}
                    </div>
                @endif
                {!! Session::forget('success') !!}
                <div class="panel panel-default" style="margin-top: 30px;">
                    <h3>Razorpay</h3><br>
                    <div class="panel-heading">
                        <h2>pagar con razorpay</h2>

                    <!-- <div class="panel-body text-center"> -->
                        <form action="{!!route('payment')!!}" method="POST" >
                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                                    data-key="{{ env('RAZOR_KEY') }}"
                                    data-amount="1000"
                                    data-buttontext="costo 10 INR"
                                    data-name="Websolutionstuff"
                                    data-description="Payment"
                                    data-image="https://websolutionstuff.com/frontTheme/assets/images/logo.png"
                                    data-prefill.name="name"
                                    data-prefill.email="email"
                                    data-theme.color="#ff7529">
                            </script>
                            <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
