<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mentor;
use App\Mentee;

class MentorRequest extends Model
{
  const PENDING_STATUS = 'PENDING';
  const ACCEPTED_STATUS = 'ACCEPTED';
  const REJECTED_STATUS = 'REJECTED';


  protected $casts = [
    "feedbackSent" => "boolean"
  ];
  
  protected $fillable = [
    'description',
    'location',
    'duration',
    'feedbackSent',
    'status',
    'mentor_id',
    'mentee_id',
    'commencement_date',
    'reasons_for_reject'
  ];

  public function isAccepted() {
    return $this->status == MentorRequest::ACCEPTED_STATUS;
  }

  public function mentor() {
    return $this->belongsTo(Mentor::class);
  }

  public function mentee() {
    return $this->belongsTo(Mentee::class);
  }
}
