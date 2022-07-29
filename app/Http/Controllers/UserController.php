<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Home page
    function home() {

        //Getting User Data for the first user.
        $data = User::all()->where('id','=',1);

        return view('welcome', compact('data'));
    }


}
