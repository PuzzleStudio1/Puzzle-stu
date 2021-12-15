<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    public function  __construct($course)
    {
        $this->course = $course;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $row[2] = "0" . $row[2];
        if (strlen($row[2]) == 11) {
            if ($row[0] != "" && $row[1] != "" && $row[2] != "") {
                $user_exists = User::where('phone', $row[2])->first();
                if ($user_exists == null) {
    
                    $user =  User::create([
                        'first_name' => $row[0],
                        'last_name' => $row[1],
                        'phone' => $row[2],
                        'is_verify' => 1,
                    ]);
    
                    $this->course->users()->attach($user);
    
                    return $user;
                } else {
                    $this->course->users()->syncWithoutDetaching($user_exists);
                    return $user_exists;
                }
            } else {
                return $row[2];
            }
        }
        return back()->with('danger',true);
    }
}
