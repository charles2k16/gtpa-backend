<?php

namespace App\Http\Controllers\Mentor;

use App\Mentor;
use App\MentorRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MentorRequestController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Mentor $mentor)
  {
    $mentorRequests = $mentor->requests()->with('mentee')->get();
    return ['requests' => $mentorRequests];
  }

}
