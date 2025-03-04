<?php

namespace App\Http\Controllers;

// use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use Omnipay\PayPal\RestGateway;
use Faker\Factory as Faker;
use Faker\Generator;
use App\Models\Payment; 
use Illuminate\Support\Facades\Auth;
use App\Models\driveer;

class paymentController extends Controller
{
   
    private $gateway;
    public function __construct(Generator $generator)
    { 
        $this->gateway = Omnipay::create('PayPal_Rest');
       

        $this->gateway->initialize([
            'clientId' => env('PAYPAL_CLIENT_ID'),
            'secret' => env('PAYPAL_CLIENT_SECRET'),
            'testMode' => true,
        ]);


    }
    public function pay(request $request)
    {
        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()) {
                return redirect($response->getRedirectUrl());
            } else {
                return $response->getMessage();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function success(request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));
           
            $response = $transaction->send();
            if ($response->isSuccessful()) {
                $arr = $response->getData();
            
                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->payment_status = $arr['state'];
                $payment->currencym = $arr['transactions'][0]['amount']['currency'];
                $driver = driveer::where('user_id', Auth::id())->first();

                $payment->driveer_id = $driver->id;
                $payment->save();
                return 'done';


            }else{
                return $response->getMessage();
            }

        }else{
            return 'payement declinded';

        }
    }
public function error(){
    return 'ffffffffffffffff'; 
}
}
