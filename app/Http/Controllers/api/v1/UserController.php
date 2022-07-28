<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Function to get user
    public function getUser($id){
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
                }
                else {
                    return response()->json([
                        "status" => "false",
                        "message" => "User not found",
                        "data" => []
                    ], 404);
                }




        }  catch (\Exception $exception){
            return response()->json([
                "status" => "false",
                "message" => "Something went wrong.",
                "data" => []
            ], 500);
        }

    }


}
