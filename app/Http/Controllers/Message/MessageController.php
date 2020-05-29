<?php

namespace App\Http\Controllers\Message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\MessageSent;
use App\Message;

class MessageController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $messages = Message::with('user')->get();
    return ['messages' => $messages];
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $message = $request->user()->messages()->create([
      'message' => $request->message
    ]);

    broadcast(new MessageSent($message))->toOthers();

    return ['message' => $message];
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function getMessageFor($id)
  {
    $messages = Message::where('user_id', $id)->orWhere('receiver_id', $id)->get();
    return ['messages' => $messages];
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
