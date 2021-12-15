<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booklet extends Model
{
    protected $fillable = [
        'name','description','file_id','type','course_id'
    ];
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function file()
    {
        return $this->belongsTo(File::class,'file_id');
    }

}
