<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{

    protected $fillable = array('name', 'specialty', 'image','description');

    public function getRouteKeyName(){
        return 'slug';
    }
}
