<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\category;
use App\author;
use App\publisher;
use Illuminate\Database\Eloquent\SoftDeletes;

class book extends Model
{
    use SoftDeletes;
    public function category(){
        return $this->belongsTo('App\category');
    }
    public function author(){
        return $this->belongsTo('App\author');
    }
    public function publisher(){
        return $this->belongsTo('App\publisher');
    }
}
