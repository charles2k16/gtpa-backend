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

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});

// Users
Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
Route::resource('users.mentors', 'User\UserMentorController', ['only' => ['index']]);
Route::resource('users.mentees', 'User\UserMenteeController', ['only' => ['index']]);

// Mentors
Route::resource('mentors', 'Mentor\MentorController', ['except' => ['create', 'edit']]);
Route::resource('mentors.request', 'Mentor\MentorRequestController', ['only' => ['index']]);

// Mentees
Route::resource('mentees', 'Mentee\MenteeController', ['except' => ['create', 'edit']]);
Route::resource('mentees.request', 'Mentee\MenteeRequestController', ['only' => ['index']]);

// MentorRequest
Route::resource('requests', 'MentorRequest\MentorRequestController', ['except' => ['create', 'edit']]);