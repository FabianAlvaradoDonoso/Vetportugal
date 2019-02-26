<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Address
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $street
 * @property string $numeration
 * @property int $city_id
 * @property int $commune_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCommuneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereNumeration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereUpdatedAt($value)
 */
class Address extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['street', 'numeration','commune_id','city_id'];


    //Relationships

    public function city(){
        return $this->belongsTo(City::class)->select('id','name');
    }

    public function commune(){
        return $this->belongsTo(Commune::class)->select('id','name');
    }

    public function client(){
        return $this->hasOne(Client::class)->select('id','user_id', 'address_id','phone_id');
    }
}
