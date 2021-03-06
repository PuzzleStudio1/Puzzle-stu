<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = [
    'name', 'parent_id'
  ];

  public function courses()
  {
    return $this->belongsToMany(Course::class);
  }

  public function children()
  {
    return  $this->hasMany(Category::class, 'parent_id');
  }

  public function childrenRecursive()
  {
    return $this->children()->with('childrenRecursive');
  }
}
