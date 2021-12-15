<?php

namespace App\Imports;

use App\Exceptions\PhoneExists;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersAdminImport implements ToModel
{
    public function  __construct($roles)
    {
        $this->roles= $roles;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $row[2] = "0".$row[2];
        
        if ($row[0] != "" && $row[1] != "" && $row[2] !="") {
            $user_exists = User::where('phone', $row[2])->first();
            if ($user_exists == null) {

                    $user =  User::create([
                        'first_name' => $row[0],
                        'last_name' => $row[1], 
                        'phone' => $row[2],
                        'is_verify' => 1,
                    ]);
            
                    $user->giveRolesTo($this->roles);
            
                    return $user;
            }else{
                throw new PhoneExists($row[2]);
            }
        } else {
            return $row[2];
        }
    }

}
