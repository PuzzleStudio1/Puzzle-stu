<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'text','classroom_id','user_id','name','phone','voice_id'
    ];
    
    protected $timeDiff = "";
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function voice()
    {
        return $this->belongsTo(Voice::class);
    }
}
