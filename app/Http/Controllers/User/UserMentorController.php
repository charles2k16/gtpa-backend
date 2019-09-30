<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserMentorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(User $user)
  {
    $users = $user->profile()->with('user')->get();
    return ['usersMentor' => $users];
  }
}
