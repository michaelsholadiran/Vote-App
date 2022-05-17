<?php

namespace App\Exports;

use App\Candidate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CandidatesExport implements WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array
    {
        return ["name","candidate_id","level"];
    }
}
