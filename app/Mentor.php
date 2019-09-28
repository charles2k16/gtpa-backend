<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\MentorRequest;

class Mentor extends Model
{
  protected $fillable = [
    'user_id',
    'title',
    'occupation',
    'organization',
    'bio',
    'country',
    'city',
    'phone_number',
    'mentorship_areas',
    'profile_picture'
  ];

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function requests() {
    return $this->hasMany(MentorRequest::class);
  }
}
