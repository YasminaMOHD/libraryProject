<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\author;
use App\publisher;
use App\book;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use SoftDeletes;
    public  function  book(){
        return $this->hasMany('App\book');
    }
}
