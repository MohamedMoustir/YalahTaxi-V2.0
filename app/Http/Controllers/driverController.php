<?php

namespace App\Http\Controllers;

use App\Models\details_trajet;
use App\Models\disponibilites;
use App\Models\driveer;
use App\Models\trajet;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\user;
use App\Models\places;
use App\Models\Comment;
use SimpleSoftwareIO\QrCode\Facades\QrCode;



use Carbon\Carbon;

use App\Models\course_passenger;
use Illuminate\Support\Facades\Auth;
use Notification;


class driverController extends Controller
{
    public function index(request $request)
    {

        $trajets = Course::with([
            'trajet.course',
            'driveer',
            'driveer.user',
        
        ]);

        if ($request->has('search') || $request->has('sear')) {
            $search = $request->search;
            $sear = $request->sear;
            $trajets->whereHas('trajet', function ($query) use ($search) {
                $query->where('nom', 'ILIKE', "%{$search}%");
            });

            $trajets->whereHas('driveer', function ($query) use ($sear) {
                $query->where('is_available', 'ILIKE', "%{$sear}%");
            });
        }

        $trajets = $trajets->paginate(6);
        $users = user::find(auth::id());
     

        return view('home', compact('trajets', 'users'));
    }


    public function detiles($id)
    {
        session(['previous_url' => url()->current()]);
        $driver = driveer::where('user_id', $id)->first();
        $trajets = Course::with([
            'trajet' => function ($query) {
                $query->with('course');
            },
            'driveer',
            'driveer.user',
            'trajet.details_trajet',

        ])->where('id_driver', $driver->id)->get();
        $trajets = $trajets->first();


        // $driver = driveer::where('user_id', Auth::id())->first();
        $disponibilites = disponibilites::where('driveer_id', $driver->id)->latest()->first();
    
        $details_trajet = details_trajet::where('trajet_id', $trajets->trajet->id)->get();
        $course = Course::where('id_driver', $driver->id)->get();
        $course = $course->first();

        $places = places::where('statuts', 'réservé')->Where('driveer_id', $id)->count();

        $comments = Comment::where('driveer_id', $driver->id)->with('user')->paginate(1);
       $commentTrue = false;
        return view('detiles', compact('trajets', 'details_trajet', 'course', 'disponibilites', 'places','comments','commentTrue'))->with('status', 'reservations sucsses');

    }

    public function getresevation()
    {
        $driver = user::with('driveer')->where('id', Auth::id())->findOrFail(Auth::id());

        $reservation = course_passenger::with('course.driveer', 'user')
            ->whereHas('course.driveer', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->get();

        foreach ($reservation as $q) {
            $user = user::find($q->passenger_id);
        }


 
        foreach ($reservation as $reservatio) {
            $now = Carbon::now();
            $disponibilites = disponibilites::where('driveer_id', $reservatio->course->id_driver)->latest()->first();
            $departureTime = Carbon::parse($disponibilites->heure_depart);

            $diffInMinutes = $now->diffInMinutes($departureTime);

            if ($diffInMinutes < 0) {
            
                $reservatio->where('status', 'pending')->update(['status' => 'refuser']);
                $driver = driveer::where('user_id',Auth::id())->update(['is_available'=>false]);
                
            }else{
                
                $driver = driveer::where('user_id',Auth::id())->update(['is_available'=>true]);
            }

        }

        // $user = User::find(auth::id());
        // $notifications = $user->notifications;
        // var_dump($notifications);

        return view('driver.index', compact('reservation', 'driver','user'));
    }



    public function disponibledriver(request $request)
    {
        $driver = user::with('driveer')->where('id', Auth::id())->findOrFail(Auth::id());
        if ($request->has('Non')) {
            $driver->driveer->is_available = false;
            $driver->driveer->save();

        } elseif ($request->has('oui')) {
            $driver->driveer->is_available = true;
            $driver->driveer->save();
        }
        return redirect()->back();
    }


    public function viewdisponibilites()
    {

        return view('driver.disponible');
    }

    public function disponibilites(request $request)
    {

        $request->validate([
            'jour' => 'required',
            'time' => 'required',
        ]);

        if ($request->has('stauts')) {
            $disp = 'disponible';

        } else {
            $disp = 'nondisponible';
        }

        $driver = driveer::where('user_id', Auth::id())->first();

        $disponible = disponibilites::create([
            'driveer_id' => $driver->id,
            'heure_depart' => $request->time,
            'jour' => $request->jour,
            'statuts' => $disp,
        ]);
        return redirect()->back();

    }



   
}
