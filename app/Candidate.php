<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $guarded=[];


    public function post()
    {
        return $this->belongsTo(post::class);
    }
}
