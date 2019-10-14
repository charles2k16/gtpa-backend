<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 
use App\User; 

class AuthController extends Controller
{

  /**
   * Handles Registration Request
   *
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function register(Request $request) {
    $this->validate($request, [
      'name' => 'required|min:3',
      'email' => 'required|email|unique:users',
      'type' => 'required',
      'password' => 'required|min:6',
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'type' => $request->type,
      'password' =>  Hash::make($request['password'])
    ]);

    $token = $user->createToken('Gtpa')->accessToken;

    return response()->json(['access_token' => $token], 200);
  }


   /**
   * Handles Login Request
   *
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */

  public function login(Request $request) {
    $credentials = [
      'email' => $request->email,
      'password' => $request->password
    ];

    if (auth()->attempt($credentials)) {
      $token = auth()->user()->createToken('Gtpa')->accessToken;
      return response()->json(['access_token' => $token], 200);
    } else {
      return response()->json(['error' => 'UnAuthorised'], 401);
    }
  }


    /**
   * Returns Authenticated User Details
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function currentuser()
  {
    $user = Auth::user();
    return response()->json(['user' => $user], 200);
  }



   /**
   * Handles Logout Request
   *
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function logout(Request $request) {

    $token = $request->user()->token();
    $token->revoke();

    $response = 'You have been succesfully logged out!';
    return response()->json(['auth' => $response], 200);
  }
}
