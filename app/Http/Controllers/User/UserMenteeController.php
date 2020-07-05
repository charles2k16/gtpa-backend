<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Mentee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserMenteeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($id)
  {
    $user = User::with('mentee')->findOrFail($id);

    $menteeId = $user->mentee->id;
    $mentee = Mentee::with('user')->findOrFail($menteeId);
    return ['mentee' => $mentee];
  }
}
