<?php

namespace App;
use App\DateTime;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    public function datetimes()
    {
        return $this->hasMany(DateTime::class);
    }
    protected $fillable = [
        'date', 'id',
    ];
}
