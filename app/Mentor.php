<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Feedback;
use App\MentorRequest;

class Mentor extends Model
{

  protected $casts = [
    "mentored_before" => "boolean",
    "support_on_how_to_mentor" => "boolean"
  ];
  
  protected $fillable = [
    'user_id',
    'age',
    'name',
    'firstName',
    'lastName',
    'title',
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
    'expertise',
    'industry',
    'years_of_exp',
    'support_on_how_to_mentor',
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
