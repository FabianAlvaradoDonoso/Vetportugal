<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialty extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name'
    ];
    protected $dates = ['deleted_at'];

    //Relationships

    public function vets(){
        return $this->belongsToMany('App\Vet', 'specialty_vet')->withPivot('id');
    }
    public function vet()
    {
        return $this->belongsTo(Vet::class);
    }
}
