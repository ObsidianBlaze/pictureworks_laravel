<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home Page
Route::get('/', 'UserController@home');


//Changing views to get different users
Route::prefix('/user')->group(function () {

    //get user
    Route::get('/{id}', 'UserController@getUser');

    //update a users comment
    Route::post('/comment/{id}', 'UserController@update');


});

