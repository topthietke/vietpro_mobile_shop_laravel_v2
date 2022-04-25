<?php

namespace App\Exports;

use App\Models\Comments;
use Maatwebsite\Excel\Concerns\FromCollection;

class CommentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Comments::all();
    }
}
