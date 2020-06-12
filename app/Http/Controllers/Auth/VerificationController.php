<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Email Verification Controller
  |--------------------------------------------------------------------------
  |
  | This controller is responsible for handling email verification for any
  | user that recently registered with the application. Emails may also
  | be re-sent if the user didn't receive the original email message.
  |
  */

  use VerifiesEmails;

  /**
  * Mark the authenticated user’s email address as verified.
  *
  * @param \Illuminate\Http\Request $request
  * @return \Illuminate\Http\Response
  */

  public function verify(Request $request)
  {
    $userID = $request['id'];

    $user = User::findOrFail($userID);

    $date = date('Y-m-d g:i:s');
    $user->email_verified_at = $date;

    $user->save();
    return redirect()->away('http://localhost:8080/#/login');
  }

  /**
  * Resend the email verification notification.
  *
  * @param \Illuminate\Http\Request $request
  * @return \Illuminate\Http\Response
  */

  public function resend(Request $request)
  {
    if ($request->user()->hasVerifiedEmail()) {
      return response()->json('User already have verified email!', 422);
    }

    $request->user()->sendEmailVerificationNotification();
    return response()->json('The notification has been resubmitted');
  }

  /**
   * Where to redirect users after verification.
   *
   * @var string
   */
  // protected $redirectTo = '/home';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth')->except(['verify','resend']);
      $this->middleware('signed')->only('verify');
      $this->middleware('throttle:6,1')->only('verify', 'resend');
  }
}
