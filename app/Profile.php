<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $fillable = [
    'user_id', 'avatar', 'about', 'facebook', 'twitter', 'youtube'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
