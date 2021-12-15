<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'name','player_id','course_id','classroom_date','classroom_end_date','link','stu_num','finished','free'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
}
