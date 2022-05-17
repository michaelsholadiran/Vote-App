<?php

namespace App\Exports;

use App\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostsExport implements WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array
    {
        return ["name"];
    }
}
