<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    //
    protected $table = 'notifs';

    protected $fillable = [
        'title', 'text', 'notif_date', 'course_id'
    ];
    
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
