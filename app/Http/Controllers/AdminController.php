<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class AdminController extends Controller
{
    
    public function grstionUsers(){
     $users = users::all();

    }
}
