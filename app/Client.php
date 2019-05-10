<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $casts = [
        'address'   =>  'object'
    ];

    public function estimates()
    {
        return $this->hasMany('App\Estimate');
    }
}
