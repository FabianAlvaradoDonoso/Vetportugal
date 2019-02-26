<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deworming extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    //Relationships

    public function pet(){
        return $this->belongsTo(Pet::class);
    }
}
