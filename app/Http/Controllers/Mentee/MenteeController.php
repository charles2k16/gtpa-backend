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
    $mentees = Mentee::with('user')->orderBy('created_at', 'desc')->get();
    return ['total' => $mentees->count(), 'mentees' => $mentees];
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
    ];
    $this->validate($request, $rules);

    $data = $request->all();

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
    $mentee = Mentee::findOrFail($id);
    return ['mentee' => $mentee];
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
    $mentee = Mentee::findOrFail($id);
    $this-> validate($request, [
      'title' => 'string'
    ]);

    // if($request->profile_picture !== $mentee->profile_picture) {
    //   $name = time().'.' . explode('/', explode(':', substr($request->profile_picture, 0, strpos($request->profile_picture, ';')))[1])[1];
    //   \Image::make($request->profile_picture)->save(public_path('img/profile/').$name);

    //   $currentPhoto = public_path('img/profile/').$mentee->profile_picture;
    //   if(file_exists($currentPhoto)) {
    //     @unlink($currentPhoto);
    //   }
    // }

    $mentee->update($request->all());
    return ['mentee' => $mentee];
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $mentee = Mentee::findOrFail($id);
    $mentee->delete();
    return ['mentee' => $mentee]; 
  }
}
