<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mentor;
use App\User;

class MentorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $mentors = Mentor::with('user')->get();
    return ['mentors' => $mentors];
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $rules = [
      'user_id' => 'required',
      'country' => 'required',
      'city' => 'required',
      'phone_number' => 'required',
    ];
    // We validate the request and the rules
    $this->validate($request, $rules);
    
    $data = $request->all();

    $mentor = Mentor::create($data);
    return ['mentor' => $mentor];
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $mentor = Mentor::findOrFail($id);
    return ['mentor' => $mentor];
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $mentor = Mentor::findOrFail($id);
    $this-> validate($request, [
      'title' => 'string'
    ]);
    $mentor->update($request->all());
    return ['mentor' => $mentor];
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $mentor = Mentor::findOrFail($id);
    $mentor->delete();
    return ['mentor' => $mentor];
  }
}
