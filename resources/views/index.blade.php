<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>squareup</title>
</head>

<body>
    <form id="payment-form">
        <div id="card-container"></div>
        <button id="card-button" type="button">Pay</button>
    </form>
    <script src="https://sandbox.web.squarecdn.com/v1/square.js"></script>
    <!-- Configure the Web Payments SDK and Card payment method -->
    <script type="text/javascript">
        async function main() {
            const APPLICATION_ID = "sandbox-sq0idb-J7OLT2hNbBgsxIE9sIbwRg"
            const LOCATION_ID = "LEN5VMAC89JK6"
            const payments = Square.payments(APPLICATION_ID, LOCATION_ID);
            const card = await payments.card();
            const contentType = null;

            await card.attach('#card-container');

            async function eventHandler(event) {
                event.preventDefault();

                try {
                    const result = await card.tokenize();
                    if (result.status === 'OK') {
                        console.log(`Payment token is ${result.token}`);

                        const respuesta = await formulario(result.token);
                        console.log(result.token);
                    }
                } catch (e) {
                    console.error(e);
                }
            };

            const cardButton = document.getElementById('card-button');
            cardButton.addEventListener('click', eventHandler);
        }

        main();

        const formulario = async(data) => {
            const res = await fetch('/charge', {
                method: 'Post',
                mode: 'cors',
                cache: 'no-cache',
                credentials: 'same-origin',
                headers: {
                    'Authorization': 'Bearer  EAAAECQXFxtmTewJEbqLIC0w-ey_ugrx3Qh97da9VFzNg-snG9u2A6hpQqLaaFRI',
                    'X-CSRF-TOKEN':'{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    "token": data
                })
            })
            return res.json();
        }
    </script>
</body>
</html>
