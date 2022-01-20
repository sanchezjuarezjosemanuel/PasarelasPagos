<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nikolag\Square\Facades\Square;
use Nikolag\Square\Models\Customer;
class ChargeController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }
    public function charge(Request $request)
    {
        $amount = 10;
        $formNonce = $request->token;
        $location_id = 'LEN5VMAC89JK6';
        $currency = 'USD';
        $note = 'This is my first payment to Square with this library';
        $reference_id = '25';
        $options = [
            'amount' => $amount,
            'source_id' => $formNonce,
            'location_id' => $location_id,
            'currency' => $currency,
            'note' => $note,
            'reference_id' => $reference_id
          ];
          $customer = array(
            'first_name' => 'John',
            'last_name' => 'Doe',
            'company_name' => 'ABC Company', //Optional
            'nickname' => 'Johny boy', //Optional
            'email' => 'john.doe@gmail.com',
            'phone' => '+389651989221', //Optional
            'note' => 'Great guy',
          );

        $transaction = Square::charge($options);

        return response()->json(compact('transaction'));
    }
}
