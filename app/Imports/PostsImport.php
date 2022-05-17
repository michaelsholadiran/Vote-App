<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Post;
use Maatwebsite\Excel\Concerns\ToModel;

class PostsImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
          'name'     => $row[0]

        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
