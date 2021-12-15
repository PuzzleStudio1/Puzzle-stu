<?php

namespace App\Services\Course\Traits;

use App\Classroom;
use Illuminate\Support\Arr;

trait HasClassrooms
{
    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }

    public function giveClassrommsTo(...$classrooms)
    {
        $classrooms = $this->getAllClassrooms($classrooms);
        
        if($classrooms->isEmpty()) return $this;

        $this->classrooms()->sync($classrooms);
    }

    protected function getAllClassrooms(array $classrooms)
    {
        return Classroom::whereIn('name',Arr::flatten($classrooms))->get();
    }
    
    public function hasClassrooms(string $classrooms)
    {
        return $this->classrooms->contains('name',$classrooms);
    }
}