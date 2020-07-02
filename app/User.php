<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\VerifyEmail;
use Laravel\Passport\HasApiTokens;
use App\Mentor;
use App\Mentee;
use App\Message;
use App\Post;

class User extends Authenticatable implements MustVerifyEmail
{
  use HasApiTokens, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  const ADMIN_USER = 'Admin';
  const MENTOR = 'Mentor';
  const MENTEE = 'Mentee';

  protected $fillable = [
    'name', 'email', 'requests', 'sent_a_request', 'password', 'type', 'pic', 'last_active', 'suspended'
  ];

  public function sendEmailVerificationNotification()
  {
    $this->notify(new VerifyEmail);
  }

  public function isAdmin() {
    return $this->type == User::ADMIN_USER;
  }

  public function isMentor() {
    return $this->type == User::MENTOR;
  }

  public function isMentee() {
    return $this->type == User::MENTEE;
  }

  public function messages() {
    return $this->hasMany(Message::class);
  }

  public function posts () {
    return $this->hasMany(Post::class);
  }

  public function mentee () {
    return $this->hasOne(Mentee::class);
  }

  public function mentor () {
    return $this->hasOne(Mentor::class);
  }

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    "sent_a_request" => "boolean",
    "suspended" => "boolean",
  ];
}
