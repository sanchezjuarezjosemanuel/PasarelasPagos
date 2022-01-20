<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    //

    public function razorPay()
    {
        return view("razor.index");
    }

    public function payment(Request $request)
    {
        # code...
        $input = $request->all();
        $api=new Api(env('RAZOR_KEY'),env('RAZOR_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input) && !empty($input['razorpay_paymet:id'])){
          try {
              $response=$api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=> $payment['amount']));
          } catch (\Exception $e) {
              //throw $th;
              return $e->getMessage();
              \Session::put('error',$e->getMessage());
              return redirect()->back();
          }
        }
        \Session::put('success','pago exitoso');
        return redirect()->back();
    }
}
