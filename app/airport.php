<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class airport extends Model
{
    public function flight(){

        return $this->belongsToMany('App\Flight');
    }
}
