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

  Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify')->middleware('signed');
  Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

  // public routes
  Route::resource('mentors', 'Mentor\MentorController', ['only' => ['index', 'show']]);
  Route::resource('events', 'Event\EventController', ['only' => ['index', 'show']]);
  Route::resource('posts', 'Post\PostController', ['only' => ['index', 'show']]);

  Route::middleware('auth:api')->group(function () {
    Route::get('currentuser', 'Auth\AuthController@currentuser')->middleware('verified');
    Route::get('logout','Auth\AuthController@logout');
  });

  Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
  });

  Route::middleware('auth:api')->group(function () {

    // users
    Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
    Route::resource('users.mentors', 'User\UserMentorController', ['only' => ['index']]);
    Route::resource('users.mentees', 'User\UserMenteeController', ['only' => ['index']]);

    // messages
    Route::resource('messages', 'Message\MessageController', ['only' => ['index']]);
    Route::resource('messages', 'Message\MessageController', ['only' => ['store']]);
    Route::post('conversation', 'Message\MessageController@getMessageFor');

    // dashboard
    Route::get('dashboard_reports', 'Dashboard\DashboardController@index');

    // feedback
    Route::resource('feedbacks', 'Feedback\FeedbackController', ['except' => ['create', 'edit']]);

    // mentors
    Route::resource('mentors', 'Mentor\MentorController', ['only' => ['update', 'destroy', 'store']]);
    Route::resource('mentors.request', 'Mentor\MentorRequestController', ['only' => ['index']]);
    Route::resource('mentors.feedback', 'Mentor\MentorFeedbackController', ['only' => ['index']]);

    // mentees
    Route::resource('mentees', 'Mentee\MenteeController', ['except' => ['create', 'edit']]);
    Route::resource('mentees.request', 'Mentee\MenteeRequestController', ['only' => ['index']]);
    Route::resource('mentees.feedback', 'Mentee\MenteeFeedbackController', ['only' => ['index']]);

    // requests
    Route::resource('requests', 'MentorRequest\MentorRequestController', ['except' => ['create', 'edit']]);

    // posts
    Route::resource('posts', 'Post\PostController', ['only' => ['update', 'destroy', 'store']]);

    // events
    Route::resource('events', 'Event\EventController', ['only' => ['update', 'destroy', 'store']]);
  
    // category
    Route::resource('categories', 'Category\CategoryController', ['except' => ['create', 'edit']]);

  });
  
});