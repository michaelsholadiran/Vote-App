<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $guarded=[];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
}
