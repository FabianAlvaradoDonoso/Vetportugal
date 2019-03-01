<?php

namespace App;

use App\DateTime;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    public function dateTime()
    {
        return $this->hasMany(DateTime::class);
    }
}
