<?php

namespace App\Http\Controllers\Feedback;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feedback;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $feedbacks = Feedback::with('mentee', 'mentor')->orderBy('created_at', 'desc')->get();
      return ['feedbacks' => $feedbacks];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $mentor = $request->input('mentor_id');
      $mentee = $request->input('mentee_id');
      $sent = $request->input('sent');

      $data = [
        'mentor_id' => $mentor,
        'mentee_id' => $mentee,
        'sent' => $sent
      ];

      $feedback = Feedback::create($data);
      return ['feedback' => $feedback];
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
      $feedback = Feedback::findOrFail($id);

      $feedback->update($request->all());
      return ['feedback' => $feedback];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $feedback = Feedback::findOrFail($id);
      $feedback->delete();
      return ['feedback' => $feedback];
    }
}
