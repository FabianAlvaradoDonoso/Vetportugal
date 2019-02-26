<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Cage
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cage query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $description
 * @property int $pet_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cage wherePetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cage whereUpdatedAt($value)
 */
class Cage extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    //Relationships

    public function pet(){
        return $this->belongsTo(Pet::class);
    }
}
