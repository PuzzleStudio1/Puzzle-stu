<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name', 'code', 'help'
    ];

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
