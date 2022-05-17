<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loginactivie extends Model
{
    //

    protected $guarded=[];

    public function voter()
    {
        return $this->belongsTo(Voter::class, 'user_id');
    }
}
