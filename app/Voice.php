<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voice extends Model
{
    protected $fillable = [
        'user_id','path'
    ];

    public function question()
    {
        return $this->hasOne(Question::class);
    }
}
