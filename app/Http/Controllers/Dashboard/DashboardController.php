<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feedback;
use App\User;
use App\Mentor;
use App\Mentee;
use App\MentorRequest;

class DashboardController extends Controller
{
  /**
   * Display a listing of all app reports and stats.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $feedbacks = Feedback::all()->count();
    $mentors = Mentor::all()->count();
    $mentees = Mentee::all()->count();
    $users = User::all()->count();
    $requests = MentorRequest::all()->count();

    $data = [
      'feedbacks' => $feedbacks,
      'mentors' => $mentors,
      'mentees' => $mentees,
      'users' => $users,
      'requests' => $requests
    ];

    return ['reports' => $data];
  }
}
