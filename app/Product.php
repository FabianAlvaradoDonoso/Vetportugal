<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = array('name', 'description',
    'imagen','resumen');

public function getRouteKeyName(){
return 'slug';
}
}
