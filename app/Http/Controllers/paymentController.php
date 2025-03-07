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
use App\Models\course_passenger;
use App\Models\user;
use App\Models\places;
use App\Models\Notification;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

            $reservation = course_passenger::create([
                'course_id' => $request->course_id,
                'passenger_id' => Auth::id(),
                'depart' => $request->depart,
                'arriver' => $request->arriver,
                'departure_time' => $request->departure_time,
                'price' => 120,
                'status' => 'pending',
                'payment_id' => 'aa',
            ]);
            $reservation->save();
            $course_passenger_id = $reservation->id;

            $place = places::create([
                'course_passenger_id' => $course_passenger_id,
                'driveer_id' => $request->driver_id,
            ]);

            $place = Notification::create([
                'user_id' => Auth::id(),
                'driveer_id' => $request->driver_id,
                'title' => 'Réservation de trajet',
                'content' => 'Votre réservation a été confirmée avec succès.',

            ]);
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();
                 
            session(['id' => $request->driver_id]);
        

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
                // if (session()->has('id')) {
                //     $driver = driveer::where('id', intval(session('id')))->first();
                // }         

      
                $payment->driveer_id =intval(session('id'));
                $payment->save();
                $last_course_passenger = course_passenger::latest()->first();
                $last_course_passenger->payment_id = $arr['id'];
                $last_course_passenger->save();

             
                return redirect(session('previous_url')); 


            } else {
                return $response->getMessage();
            }

        } else {
            return 'payement declinded';

        }
    }
    public function error()
    {
        return 'ffffffffffffffff';
    }
}
