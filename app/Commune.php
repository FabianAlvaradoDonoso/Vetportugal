<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Commune
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Commune newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Commune newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Commune query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Commune whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Commune whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Commune whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Commune whereUpdatedAt($value)
 */
class Commune extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable= ['name'];


    //Relationships

    public function addresses(){
        return $this->hasMany(Address::class);
    }
}
