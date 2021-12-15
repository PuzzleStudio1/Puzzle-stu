<?php

namespace App;

use App\Services\Auth\Traits\HasTwoFactor;
use App\Services\Permission\Traits\HasPermissions;
use App\Services\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasTwoFactor, HasPermissions, HasRoles, HasApiTokens;

    protected $absenceDuration = "";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'city_id','is_verify','phone', 'school', 'grade', 'email', 'password','birthday', 'field_of_study','address','info','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    public function hasAbsenceClassroom(string $classroom)
    {
        return $this->absences->contains('classroom_id',$classroom);
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function coursesTeach()
    {
        return $this->belongsToMany(Course::class,'teacher_id');
    }
    
    public function photo()
    {
        return $this->belongsTo(File::class,'photo_id');
    }

    public function hasCourse(string $course)
    {
        return $this->courses->contains('id',$course);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Order::class,'user_id','order_id','id','id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id');
    }
}
