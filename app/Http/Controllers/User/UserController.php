<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = User::all();
    return ['users' => $users];
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
      'first_name' => 'required',
      'last_name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6'
    ];
    // We validate the request and the rules
    $this->validate($request, $rules);

    // We store all the request fields in the data variable
    $data = $request->all();
    // Lets now set our default data from the request
    $data['password'] = Hash::make($request['password']);
    $data['type'] = $request->type;

    $user = User::create($data);
    return ['user' => $user];
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $user = User::findOrFail($id);
    return ['user' => $user];
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
    $user = User::findOrFail($id);
    $this-> validate($request, [
      'first_name' => 'string|max:191',
      'email' => 'email|max:191|unique:users,email,'.$user->id,
      'password' => 'sometimes|string|min:6'
    ]);
    $user->update($request->all());
    return ['user' => $user];
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $user = User::findOrFail($id);
    $user->delete();
    return ['user' => $user];
  }
}
