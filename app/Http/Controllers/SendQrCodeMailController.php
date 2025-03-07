<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use app\Mail\SendQrCodeMail;
class SendQrCodeMailController extends Controller
{
   
    // public function sendQrCodeEmail($reservation){
    //     dd($reservation);
    //     $reservationInfo = 'ID: '. $reservation->passenger_id . ' - Driver: ' . Auth()->user()->name . ' - Depart: ' . $reservation->depart . ' - Arrive: ' . $reservation->arrive;
    //     $qrCode = QrCode::size(300)->generate($reservationInfo);
    //     Mail::to('itsmoustir@gmail.com')->send(new SendQrCodeMail($qrCode));
    // }
}
