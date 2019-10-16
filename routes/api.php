<?php

use Illuminate\Http\Request;

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


Route::group(['middleware' => ['json.response']], function () {

  Route::post('login', 'Auth\AuthController@login');
  Route::post('register', 'Auth\AuthController@register');

  Route::middleware('auth:api')->group(function () {
    Route::get('currentuser', 'Auth\AuthController@currentuser');
    Route::get('logout','Auth\AuthController@logout');
  });

  Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
  });

  Route::middleware('auth:api')->group(function () {
    Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
    Route::resource('users.mentors', 'User\UserMentorController', ['only' => ['index']]);
    Route::resource('users.mentees', 'User\UserMenteeController', ['only' => ['index']]);

    Route::resource('mentors', 'Mentor\MentorController', ['except' => ['create', 'edit']]);
    Route::resource('mentors.request', 'Mentor\MentorRequestController', ['only' => ['index']]);

    Route::resource('mentees', 'Mentee\MenteeController', ['except' => ['create', 'edit']]);
    Route::resource('mentees.request', 'Mentee\MenteeRequestController', ['only' => ['index']]);

    Route::resource('requests', 'MentorRequest\MentorRequestController', ['except' => ['create', 'edit']]);
  });
  
});