<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //
    public function voter()
    {
        return $this->belongsTo(Voter::class);
    }
    protected $guarded=[];
}
