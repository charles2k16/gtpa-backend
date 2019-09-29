<?php

namespace App\Http\Controllers\Mentee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mentee;

class MenteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $mentees = Mentee::all();
      return ['mentees' => $mentees];
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
        'occupation' => 'required',
        'organization' => 'required',
        'country' => 'required',
        'city' => 'required',
        'phone_number' => 'required',
        'profile_picture' => 'required',
      ];
      // We validate the request and the rules
      $this->validate($request, $rules);
  
      // We store all the request fields in the data variable
      $data = $request->all();
      // Lets now set our default data from the request
  
      $mentee = Mentee::create($data);
      return ['mentee' => $mentee];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
