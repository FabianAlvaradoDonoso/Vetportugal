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
    public function dateTimes()
    {
        return $this->belongsTo(DateTime::class);
    }
    protected $fillable = [
        'name', 'phone', 'state_id', 'vet_id', 'date_times_id'
    ];
}
