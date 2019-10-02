<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Mentor;
use App\Mentee;

class User extends Authenticatable
{
  use HasApiTokens, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  const ADMIN_USER = 'admin';
  const MENTOR = 'mentor';
  const MENTEE = 'mentee';

  protected $fillable = [
    'name', 'email', 'password', 'type'
  ];

  public function isAdmin() {
    return $this->type == User::ADMIN_USER;
  }

  public function isMentor() {
    return $this->type == User::MENTOR;
  }

  public function isMentee() {
    return $this->type == User::MENTEE;
  }

  public function profile() {

    switch ($this->type) {
      case User::MENTEE:
        return $this->hasOne(Mentee::class);
        break;

      case User::MENTOR:
        return $this->hasOne(Mentor::class);
        break;

      default:
        break;
    }
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
  ];
}
