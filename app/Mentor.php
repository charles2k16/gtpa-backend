<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Feedback;
use App\MentorRequest;

class Mentor extends Model
{

  protected $casts = [
    'mentorship_areas' => 'json'
  ];
  
  protected $fillable = [
    'user_id',
    'age',
    'name',
    'firstName',
    'lastName',
    'title',
    'address',
    'email',
    'occupation',
    'organization',
    'bio',
    'country',
    'city',
    'state',
    'postCode',
    'source',
    'mentored_before',
    'explain',
    'expertise',
    'industry',
    'years_of_exp',
    'why_do_you_want_to_mentor',
    'phone_number',
    'pic',
    'mentorship_areas',
  ];

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function requests() {
    return $this->hasMany(MentorRequest::class);
  }
  public function feedbacks() {
    return $this->hasMany(Feedback::class);
  }
}
