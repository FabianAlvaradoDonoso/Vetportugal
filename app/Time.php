<?php

namespace App;

use App\DateTime;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    public function datetimes()
    {
        return $this->hasMany(DateTime::class);
    }
}
