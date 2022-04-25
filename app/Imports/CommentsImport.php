<?php

namespace App\Imports;

use App\Models\Comments;
use Maatwebsite\Excel\Concerns\ToModel;

class CommentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Comments([
            //
            'cusid'=>$row['0'],
            'prdid'=>$row['1'],
            'com_detail'=>$row['2'],
            'com_status'=>$row['3'],
        ]);
    }
}
