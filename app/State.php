<?php

namespace App;

use App\Appointment;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
}
