<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model
{

  protected $fillable = ['message', 'receiver_id'];

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function getSelfMessageAttribute() {
    return $this->user_id === auth()->user()->id;
  }

  public function getReceiverAttribute() {
    return User::where('id', $this->receiver_id)->first();
  }

  protected $appends = ['selfMessage', 'receiver'];
}
