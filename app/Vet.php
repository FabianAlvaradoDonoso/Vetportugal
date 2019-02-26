<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Vet
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vet query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $rut
 * @property string $title
 * @property int $user_id
 * @property int $phone_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vet wherePhoneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vet whereRut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vet whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vet whereUserId($value)
 */
class Vet extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'rut',
        'user_id',
        'phone_id',
    ];
    protected $dates = ['deleted_at'];

    //Relationships

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function phone(){
        return $this->belongsTo(Phone::class);
    }

    public function pets(){
        return $this->belongsToMany('App\Pet', 'pets_vets');
    }

    public function specialties(){
        return $this->belongsToMany('App\Specialty', 'specialty_vet')->withPivot('id');
    }
}
