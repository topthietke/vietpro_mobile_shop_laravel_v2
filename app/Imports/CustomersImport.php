<?php

namespace App\Imports;

use App\Models\Customers;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customers([
            'cus_name'=>$row['0'], 
            'cus_gender'=>$row['1'],
            'cus_birthday'=>$row['2'],
            'cus_phone'=>$row['3'],
            'cus_identity_card'=>$row['4'],
            'cus_address'=>$row['5'], 
            'cus_email'=>$row['6'],
            'cus_password'=>bcrypt($row['7']),
            'cus_status'=>$row['8'],           
            'cus_join'=>$row['9'],           
            
        ]);
    }
}
