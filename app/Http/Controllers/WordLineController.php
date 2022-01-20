<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use SecurionPay\SecurionPayGateway;
use SecurionPay\Exception\SecurionPayException;

class WordLineController extends Controller
{

    protected $sk_test_;

    public function __construct()
    {
        $this->sk_test_="sk_test_cXj6d7t2F0YNT6bMFP80lKWE";
    }


    public function index()
    {
        $headers = array(
            'authorization:SZJNBZ2JRW-J2WLJRWZLH-KJWGGGJWJH',
            'Content-Type: application/json',
        );

        $data=array("profile_id" => 88028,"tran_type" => "Sale","tran_class" => 'ecom',"cart_description" => "Dummy Order 35925502061445345",
        "cart_currency" => "USD","cart_amount" => 46.17,"cart_id" => "4244b9fd-c7e9-4f16-8d3c-4fe7bf6c48ca");

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://secure-global.paytabs.com/payment/request");
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        return view("WordLine.index",compact('response'));
    }

    public function securionpay()
    {
        return view("WordLine.securionpay");
    }

    public function Postsecurionpay(Request $request)
    {
        $gateway = new SecurionPayGateway($this->sk_test_);
        $request = array(
            'amount'=>$request->amount,
            'currency'=>$request->currency,
            "description"=>"Pago de pruebas",
            'card' => array(
                'number' => $request->numbre,
                'expMonth' => intval($request->MM),
                'expYear' => intval($request->YY),
                'cardholderName' => "Jose Manuel"
            ),
            'metadata' => array(
                'email'=>"jose.novafactum@gmail.com",
                "telefono"=>"2215912396",
                "evento"=>'panvet'
            )
        );
        try {
            $charge = $gateway->createCharge($request);
            $chargeId = $charge->getId();
            return response()->json([
                'data'=>[
                "idorden"=>$chargeId
                ]
            ]);
        } catch (SecurionPayException $e) {
            $errorType = $e->getType();
            $errorCode = $e->getCode();
            $errorMessage = $e->getMessage();
            return response()->json(["data"=>["error"=>$errorType,
            "errorcode"=> $errorCode,"errorMessage"=>$errorMessage]]);
        }

    }

}
