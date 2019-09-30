<?php

namespace App\Http\Controllers\MentorRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MentorRequest;

class MentorRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $mentorRequest = MentorRequest::all();
      return ['requests' => $mentorRequest];
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
        'mentee_id' => 'required',
        'commencement_date' => 'required',
        'duration' => 'required',
      ];
      // We validate the request and the rules
      $this->validate($request, $rules);
  
      // We store all the request fields in the data variable
      $data = $request->all();
      // Lets now set our default data from the request
  
      $mentorRequest = MentorRequest::create($data);
      return ['mentee' => $mentorRequest];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $request = MentorRequest::findOrFail($id);
      return ['request' => $request];
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $request = MentorRequest::findOrFail($id);
      $request->delete();
      return ['user' => $request];
    }
}
