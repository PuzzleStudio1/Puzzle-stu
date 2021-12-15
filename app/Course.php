<?php

namespace App;

use App\Services\Course\Traits\HasCategories;
use App\Services\Course\Traits\HasClassrooms;
use App\Services\Course\Traits\HasStudents;
use App\Services\Course\Traits\HasTags;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasCategories, HasTags, HasClassrooms, HasStudents;

    protected $fillable = [
        'name', 'teacher_id', 'institute_id', 'description', 'price',
        'discount_price', 'type', 'status', 'photo_id',
         'player_id','live_class','chat','see_absences', 'limited'
    ];

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }

    public function codes()
    {
        return $this->hasMany(Code::class);
    }

    public function liveClass()
    {
        return $this->belongsTo(Classroom::class,'live_class');
    }

    public function absences()
    {
        return $this->hasMany('App\Absence');
    }

    public function booklets()
    {
        return $this->hasMany(Booklet::class);
    }

    public function notifs()
    {
        return $this->hasMany(Notif::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function player()
    {
        return $this->hasOne('App\Player');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function institute()
    {
        return $this->belongsTo(User::class, 'institute_id');
    }

    public function photo()
    {
        return $this->belongsTo(File::class,'photo_id');
    }
}
