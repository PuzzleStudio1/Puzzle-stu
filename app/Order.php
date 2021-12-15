<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Order extends Model
{
    protected $fillable = ['user_id','code','price','course_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function giveCoursesTo(...$courses)
    {
        $courses = $this->getAllCourses($courses);

        if ($courses->isEmpty()) return $this;

        $this->courses()->sync($courses);

        return $this;
    }

    protected function getAllCourses(array $courses)
    {
        $newCourses = $courses[0];

        $idCourses = [];

        foreach ($newCourses as $course) {
            array_push($idCourses,$course->id);
        }

        return Course::whereIn('id', $idCourses)->get();
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
