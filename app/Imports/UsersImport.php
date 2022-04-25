<?php

namespace App\Imports;

use App\Models\Users;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Users([
            'full'=>$row['0'], 
            'password' => bcrypt($row['1']), 
            'address'=> $row['2'], 
            'email'=> $row['3'], 
            'phone'=> $row['4'], 
            'gender'=>$row['5'],
            'level'=> $row['6'],
            'status'=> $row['7'],            
        ]);
    }
}
