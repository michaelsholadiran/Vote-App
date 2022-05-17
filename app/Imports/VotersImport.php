<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Voter;
use Maatwebsite\Excel\Concerns\ToModel;

class VotersImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Voter([
          'name'     => $row[0],
          'user_id'     => $row[1],
          'level'     => $row[2],
          'password'     => bcrypt('voter')

        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
