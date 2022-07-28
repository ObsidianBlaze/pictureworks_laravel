<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\staticPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    //Function to get user
    public function getUser($id)
    {
        try {

            $user = new User();

            //Checking if an id exist
            $userObject = $user::where('id', $id)->first();

            if ($userObject) {
                $user = User::find($id);
                return response()->json([
                    "status" => "true",
                    "message" => "User found",
                    "data" => $user
                ]);
            } else {
                return response()->json([
                    "status" => "false",
                    "message" => "User not found",
                    "data" => []
                ], 404);
            }


        } catch (\Exception $exception) {
            return response()->json([
                "status" => "false",
                "message" => "Something went wrong.",
                "data" => []
            ], 500);
        }

    }


    //Funtion to update comment
    //Update a scrap type
    public function update(Request $request, $id)
    {
        //Validating and storing a users data in a variable
        $validate = Validator::make($request->all(), [
            //Adding a custom validation using closure.

//            Creating validation rule that fails if a user does not use the static password [720DF6C2482218518FA20FDC52D4DED7ECC043AB]
            'password' => ['required', new staticPassword, 'min:8'],
            'comment' => 'bail|required|string',

            //Note the bail keyword is used to terminate the validation if one of the fields does not meet the requirement.
        ]);

        //Returning an error when the user provides wrong data.
        if ($validate->fails())

            //Response if the users input does not match the validation.
            return response()->json(
                [
                    "status" => "false",
                    "message" => $validate->errors(),
                    "data" => []
                ], 400);

        //Checking if an id exist
        $user = User::find($id);
        if ($user) {
            //updating the user comment
            $user->comment = $request->comment;

            //Updating the user comment
            $user->save();

            //Response if user exists.
            return response()->json(
                [
                    "status" => "true",
                    "message" => "User comment appended Successfully.",
                    "data" => $user
                ]);
        } else {
            //Response if the user does not exist in the database
            return response()->json(
                [
                    "status" => "false",
                    "message" => "user does not exist.",
                    "data" => []
                ], 404);

        }
    }
}
