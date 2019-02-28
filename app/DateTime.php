<?php

namespace App;

use App\Date;
use App\Time;
use App\Appointment;
use Illuminate\Database\Eloquent\Model;

class DateTime extends Model
{
    public function time()
    {
        return $this->belongsTo(Time::class);
    }

    public function date()
    {
        return $this->belongsTo(Date::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    protected $fillable = [
        'date_id', 'time_id'
    ];

}
