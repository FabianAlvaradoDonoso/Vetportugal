<?php

namespace App;

use App\State;
use App\DateTime;
use App\Vet;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function vet()
    {
        return $this->belongsTo(Vet::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function dateTime()
    {
        return $this->belongsTo(DateTime::class);
    }
    
    public function time()
    {
        return $this->belongsTo(Time::class);
    }

    public function date()
    {
        return $this->belongsTo(Date::class);
    }

    protected $fillable = [
        'name', 'phone', 'state_id'
    ];

     //Relationships


}
