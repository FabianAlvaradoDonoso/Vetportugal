<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = array('name', 'description',
    'imagen', 'price','active','resumen');

public function getRouteKeyName(){
return 'slug';
}
}
