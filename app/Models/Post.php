<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;
  protected $guarded = ["id"];

  public function author()
  {
    return $this->belongsTo(\App\Models\User::class, "user_id", "id");
  }

  public function categories()
  {
    return $this->hasMany(\App\Models\Category::class, "id", "category_id");
  }
}
