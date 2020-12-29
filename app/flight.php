<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class flight extends Model
{
    public function airports(){

        return $this->belongsToMany('App\Airport');
    }
}
