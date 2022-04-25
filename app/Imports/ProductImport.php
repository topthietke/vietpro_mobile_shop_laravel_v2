<?php

namespace App\Imports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Products([
            //
            'name'=>$row['0'],
            'code'=>$row['1'],
            'promotion'=>$row['2'], 
            'image'=>$row['3'],
            'price'=>$row['4'],
            'accessories'=>$row['5'],
            'warrnty'=>$row['6'], 
            'slug'=>$row['7'],
            'new'=>$row['8'],
            'status'=>$row['9'], 
            'featured'=>$row['10'],
            'details'=>$row['11'],
            'catid'=>$row['12'],
        ]);
    }
}
