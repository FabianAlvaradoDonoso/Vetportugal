<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamPet extends Model
{
    public function exam(){
        return $this->belongsTo(Exam::class);
    }
    public function pet(){
        return $this->belongsTo(Pet::class);
    }
}
