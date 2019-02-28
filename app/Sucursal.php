<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $fillable = array('name', 'adress', 'phone','cellphone','description',
                                'imagen', 'maplink','youtubevideo','active');

    public function getRouteKeyName(){
        return 'slug';
    }
}
