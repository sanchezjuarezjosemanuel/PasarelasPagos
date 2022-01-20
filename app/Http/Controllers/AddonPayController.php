<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use AddonPayments\Api\ServicesConfig;
use AddonPayments\Api\ServicesContainer;
use AddonPayments\Api\Entities\Exceptions\ApiException;
use AddonPayments\Api\PaymentMethods\CreditCardData;

class AddonPayController extends Controller
{

    public function index()
    {
        return view('addonpay.index');
    }

    public function prosesar(Request $requets)
    {
        $config = new ServicesConfig();
        $config->merchantId="novafactumtest ";
        $config->accountId="internet";
        $config->sharedSecret="JFWxuwvtOn";
        $config->serviceUrl="https://pay.sandbox.addonpayments.com/pay";


        dd(ServicesContainer::configure($config));

        $card = new CreditCardData();
        $card->number=$requets->cardNumber;
        $card->expMonth=$requets->expiryDateMM;
        $card->expYear=$requets->expiryDateYY;
        $card->cvn=$requets->cvn;
        $card->cardHolderName="James Mason";

        try {

            $response = $card->charge(19.99)->withCurrency("EUR")->execute();
            return response()->json($response);

        } catch ( ApiException $th) {
            throw $th;
        }

    }

}
