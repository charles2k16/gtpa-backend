<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $fillable = [
    'title', 'free', 'content', 'event_date', 'time', 'venue', 'category', 'image'
  ];
}
