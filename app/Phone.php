<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Phone
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $landline
 * @property string $mobile_phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereLandline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereMobilePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereUpdatedAt($value)
 */
class Phone extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable= [
        'landline', 'mobile_phone'
    ];

    //Relationships

    public function client(){
        return $this->hasOne(Client::class);
    }

    public function vet(){
        return $this->hasOne(Vet::class);
    }


}
