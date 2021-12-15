<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'title', 'description', 'usermessage', 'completed', 'dotime',
        'donetime', 'user_id', 'maker_id',
    ];

    public function maker()
    {
        return $this->belongsTo(User::class, 'maker_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
