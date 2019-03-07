<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = array('name', 'subtitle', 'btntitle','linkbtn','active');

    public function getRouteKeyName(){
        return 'slug';
    }
}
