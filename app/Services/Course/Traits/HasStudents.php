<?php

namespace App\Services\Course\Traits;

use App\User;
use Illuminate\Support\Arr;

trait HasStudents
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function giveUsersTo(...$users)
    {
        $users = $this->getAllUsers($users);
        
        if($users->isEmpty()) return $this;

        $this->users()->sync($users);
    }

    protected function getAllUsers(array $users)
    {
        return User::whereIn('id',Arr::flatten($users))->get();
    }
    
}