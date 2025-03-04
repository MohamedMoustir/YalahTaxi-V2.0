<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\course_passenger;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\places;
use App\Models\Notification;



class passeger_courseController extends Controller
{
    public function reservations(request $request)
    {

        $reservation = course_passenger::create([
            'course_id' => $request->course_id,
            'passenger_id' => Auth::id(),
            'depart' => $request->depart,
            'arriver' => $request->arriver,
            'departure_time' => $request->departure_time,
            'price' => 120,
            'status' => 'pending',
        ]);
        $reservation->save();
        $course_passenger_id = $reservation->id;

        $place = places::create([
            'course_passenger_id' => $course_passenger_id,
            'driveer_id' => $request->driveer_id,
        ]);

        $place = Notification::create([
            'user_id' => Auth::id(),
            'driveer_id' => $request->driveer_id,
            'title' => 'Réservation de trajet',
            'content' => 'Votre réservation a été confirmée avec succès.',

        ]);

        return redirect()->back();

    }


    public function gethistorique($id)
    {

        $trajets = course_passenger::where('passenger_id', $id)->get();

        $users = user::find(auth::id());
        //   dd($users);
        return view('historique', compact('trajets', 'users'));
    }

    public function refuserreservation($id)
    {
        $reservation = course_passenger::find($id);
        $reservation->delete();
        return redirect()->back();
    }

    public function accepterresevation($id)
    {
        $reservation = course_passenger::find($id);
        $reservation->update(['status' => 'approved']);

        return redirect()->back();
    }

    public function annulerresevation($id)
    {
        $reservation = course_passenger::find($id);
        $reservation->update(['status' => 'refuser']);
        return redirect()->back();
    }

   

}
