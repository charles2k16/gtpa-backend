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

// Mentors
Route::resource('mentors', 'Mentor\MentorController', ['except' => ['create', 'edit']]);

// Mentees
Route::resource('mentees', 'Mentee\MenteeController', ['except' => ['create', 'edit']]);

// MentorRequest
Route::resource('mentor_requests', 'MentorRequest\MentorRequestController', ['except' => ['create', 'edit']]);
