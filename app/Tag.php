<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $fillable = [
    'name', 'slug'
  ];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function posts()
  {
    return $this->belongsToMany(Post::class);
  }
}
