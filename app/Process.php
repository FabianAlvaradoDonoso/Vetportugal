<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    public function exampets(){
        return $this->hasMany(ExamPet::class);
    }
}
