<?php

namespace App\Http\Controllers;

use App\Models\details_trajet;
use App\Models\trajet;
use Illuminate\Http\Request;

class trajetController extends Controller
{
  public function index()
  {
    return view('admin.dashboard');
  }

  public function ditlesTrajets(){
    return view('admin.trajet');
  }

  public function store(request $request)
  {

    $request->validate([
      'nom' => 'required ',
      'order' => 'required ',
      'point_de_pause' => 'required ',
    ]);

    $trajets = trajet::create([
      'nom' => $request->nom,
      'prix'=>$request->prix[0],
    ]);
    foreach ($request->point_de_pause as $index => $point) {

      $order = $request->order[$index];
      $distance = $request->Distance[$index];
      $prix = $request->prix[$index];
 
    
        $trajets->save();
        $lastinsertId = $trajets->id;
        
      $details_trajet = details_trajet::create([
        'trajet_id' => $lastinsertId,
        'point_de_pause' => $point,
        'order_id' => $order,
        'distance'=>$distance,
        'price'=>$prix
      ]);
    }

    return redirect()->back();
  }

 public function getnomTrajet(){
  $nomLine = trajet::all();
  return view('auth.register',compact('nomLine'));
 }
 
  

}
