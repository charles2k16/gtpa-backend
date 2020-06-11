<?php

namespace App\Http\Controllers\Mentee;

use App\Mentee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenteeFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Mentee $mentee)
    {
      $menteeFeedbacks = $mentee->feedbacks()->with('mentor')->get();
      return ['feedbacks' => $menteeFeedbacks];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mentee  $mentee
     * @return \Illuminate\Http\Response
     */
    public function show(Mentee $mentee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mentee  $mentee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mentee $mentee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mentee  $mentee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mentee $mentee)
    {
        //
    }
}
