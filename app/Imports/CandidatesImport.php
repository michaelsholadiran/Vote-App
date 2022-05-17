<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Candidate;
use Maatwebsite\Excel\Concerns\ToModel;

class CandidatesImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Candidate([
          'name'     => $row[0],

           'candidate_id'    => $row[1],
           'level' => $row[2],
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
