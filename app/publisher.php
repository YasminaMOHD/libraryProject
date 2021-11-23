<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\book;
use Illuminate\Database\Eloquent\SoftDeletes;

class publisher extends Model
{
    use SoftDeletes;
    public  function  book(){
        return $this->hasMany('App\book');
    }
}
