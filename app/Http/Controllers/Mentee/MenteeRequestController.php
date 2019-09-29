<?php

namespace App\Http\Controllers\Mentee;

use App\Mentee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenteeRequestController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Mentee $mentee)
  {
    $menteeRequests = $mentee->requests()->with('mentor')->get();
    return ['requests' => $menteeRequests];
  }
}
