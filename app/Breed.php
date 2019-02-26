<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Breed extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //Relationships

    public function pets(){
        return $this->hasMany(Pet::class);
    }

    public function type(){
        return $this->belongsTo(Type::class)->select('id', 'name');
    }
}
