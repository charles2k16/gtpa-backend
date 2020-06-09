<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mentor;
use App\Mentee;

class Feedback extends Model
{
  protected $fillable = [
    'mentor_id', 'mentee_id', 'mentor_feedback', 'mentee_feedback', 'sent'
  ];

  protected $casts = [
    "sent" => "boolean",
  ];

  public function mentee() {
    return $this->belongsTo(Mentee::class);
  }

  public function mentor() {
    return $this->belongsTo(Mentor::class);
  }
}
