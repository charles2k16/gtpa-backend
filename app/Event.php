<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $fillable = [
    'title', 'free', 'content', 'event_date', 'venue', 'category', 'time', 'image'
  ];
}
