<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\driveer;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\trajet;
use App\Models\Course;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $nomLine = trajet::all();
        return view('auth.register', compact('nomLine'));
        // return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {


        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        $user = User::create([
            'profile_photo' => $path,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        $user->save();
        $lastinsertId = $user->id;
  
        if ($request->role == 'driver') {


            $driver = driveer::create([
                'user_id' => $lastinsertId,
                'license_number' => 0,
                'current_location' => $request->current_location,
            ]);
     
            //    lastinsertid driver
            $driver->save();
            $id_driver = $driver->id;

            course::create([
                'id_driver' =>$id_driver,
                'trajet_id' => $request->line,
            ]);
            
        }


        event(new Registered($user));

        Auth::login($user);
       
    
            if($request->role === 'Admin'){
              
                return redirect(route('Admin.dashboard'));
            } 

            elseif($request->role === 'driver'){
                return redirect(route('getresevation'));
            }
    
            elseif($request->role === 'Passanger'){    
                return redirect(route('home'));
            }else{
                return redirect(route('login', absolute: false));

            }
    

        }
    }


