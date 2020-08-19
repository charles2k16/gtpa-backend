<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;

class Post extends Model
{
  protected $fillable = [
    'title', 'sub_content', 'content', 'user_id', 'category', 'media'
  ];

  public function user () {
    return $this->belongsTo(User::class);
  }

  public function category () {
    return $this->belongsTo(Category::class);
  }
}
