<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{

    protected $fillable = [
        'user_id', 'present','classroom_id'
    ];

    protected $duration = "";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
