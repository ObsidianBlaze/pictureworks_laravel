<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\staticPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    //Update comment view
    public function commentView($id){
        //Getting User Data for the first user.
        $data = User::all()->where('id','=',$id);
        if($data->isEmpty())
            return view('layouts.updatecomment',compact('data'))->with("successMsg","User not found");
        else
            return view('layouts.updatecomment',compact('data'));
    }

    //Append comment feature
    public function update(Request $request, $id){
        //Validating and storing a users data in a variable
        $validate = Validator::make($request->all(), [

            //Adding a custom validation using closure.

//            Creating validation rule that fails if a user does not use the static password [720DF6C2482218518FA20FDC52D4DED7ECC043AB]
            'password' => ['required', new staticPassword, 'min:8'],
            'comment' => 'bail|required|string',

            //Note the bail keyword is used to terminate the validation if one of the fields does not meet the requirement.
        ]);

        //Checking for errors if the validation is not met.
        if ($validate->fails()) {
            //Response if the users input does not match the validation.
            return redirect('/user/comment'.'/'.$request->id)->withInput()->withErrors($validate);

        }

        //Checking if an id exist
        $user = User::find($request->id);

        if ($user) {

            //updating the user comment using implode to separate with white space
            $user->comment = implode(" ",[$user->comment,$request->comment]);

            $user->save();

            //Response if user exists.
            return redirect('/user'.'/'.$request->id)->with('successMsg',"Comment Appended successfully");
        } else {
            //Response if the user does not exist in the database
            return redirect('/user/comment'.'/'.$request->id)->with('errorMsg',"User Not Found");

        }

    }
}
