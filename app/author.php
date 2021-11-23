<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class author extends Model
{
    use SoftDeletes;
    public  function  book(){
        return $this->hasMany('App\book');
    }
}
