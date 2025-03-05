<?php

namespace App\Http\Controllers;

use App\Models\details_trajet;
use App\Models\driveer;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\trajet;
use App\Models\course_passenger;
use App\Models\payment;

class AdminController extends Controller
{
    public function index()
    {
        $users = user::where('role', 'passenger')->count();
        $driver = driveer::count();

        $trajets = trajet::count('id');

        $payments = payment::with('course_passenger')->get();
        dd($payments    );
        return view('admin.dashboard', compact('users', 'driver', 'trajets','payments'));
    }
    public function getUsers()
    {
        $users = user::all();
        return view('admin.users', compact('users'));
    }

    public function deleteUsers($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect()->back();
    }


    public function Gestion_des_trajets()
    {
        $trajets = trajet::with('details_trajet')->get();
        $trajetsTouts = trajet::count('id');
        return view('admin.trajet', compact('trajets', 'trajetsTouts'));
    }

    public function deletetrajet($id)
    {
        $trajet = trajet::find($id);
        $trajet->delete();
        return redirect()->back();
    }

    public function editetrajet($id)
    {

        $trajets = trajet::with('details_trajet')->where('id', $id)->first();

        return view('admin.editetrajet', compact('trajets'));
    }

    public function updateTrajet(request $request)
    {
        $trajets = trajet::with('details_trajet')->where('id', $request->id)->first();
        $trajets->nom = $request->nom;
        $trajets->details_trajet->order_id = $request->order_id;
        $trajets->details_trajet->distance = $request->distance;
        $trajets->details_trajet->price = $request->prix;
        $trajets->save();
        return redirect(route('trajet'));

    }



}
