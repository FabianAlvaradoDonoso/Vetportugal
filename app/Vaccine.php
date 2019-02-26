<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Vaccine
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vaccine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vaccine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vaccine query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vaccine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vaccine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vaccine whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vaccine whereUpdatedAt($value)
 */
class Vaccine extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    //Relationships

    public function pets(){
        return $this->belongsToMany('App\Pets', 'pets_vaccines');
            // ->withPivot('id', 'scheduled_date', 'application_date')
            // ->withTimestamps();
    }
}
