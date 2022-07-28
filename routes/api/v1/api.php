<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/user')->group(function () {

    //get user
    Route::get('/{id}', 'api\v1\UserController@getUser');

    //update a users comment
    Route::post('/comment/{id}', 'api\v1\UserController@update');


});
