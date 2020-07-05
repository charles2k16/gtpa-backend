<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Mentor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserMentorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($id)
  {
    $user = User::with('mentor')->findOrFail($id);
    $mentorId = $user->mentor->id;
    $mentor = Mentor::with('user')->findOrFail($mentorId);

    return ['mentor' => $mentor];
  }
}
