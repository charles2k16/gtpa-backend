<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Feedback;
use App\MentorRequest;

class Mentee extends Model
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
    'address',
    'email',
    'title',
    'occupation',
    'organization',
    'education',
    'year_completed',
    'qualification',
    'graduated',
    'why_do_you_want_to_be_mentored',
    'field_mentored',
    'out_of_field_mentored',
    'bio',
    'country',
    'city',
    'state',
    'postCode',
    'source',
    'mentored_before',
    'explain',
    'pic',
    'phone_number',
    'mentorship_areas',
  ];

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function requests() {
    return $this->hasOne(MentorRequest::class);
  }

  public function feedbacks() {
    return $this->hasMany(Feedback::class);
  }
}