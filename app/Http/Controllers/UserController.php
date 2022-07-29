<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Home page
    public function home() {

        //Getting User Data for the first user.
        $data = User::all()->where('id','=',1);

        return view('welcome', compact('data'));
    }

    //Getting a single user
    public function getUser($id){
        //Getting User Data for the first user.
        $data = User::all()->where('id','=',$id);

        return view('welcome', compact('data'));
    }
}
