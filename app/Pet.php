<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Pet
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $birthdate
 * @property string $color
 * @property string $castration_date
 * @property string $weight
 * @property int $breed_id
 * @property int $gender_id
 * @property int $type_id
 * @property int $food_id
 * @property int $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereBreedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereCastrationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereFoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereGenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereWeight($value)
 */
class Pet extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function pathAttachment () {
        return "/images/pets/" . $this->picture;
    }
    //Relationships

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function breed(){
        return $this->belongsTo(Breed::class);
    }

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function food(){
        return $this->belongsTo(Food::class);
    }

    public function vaccines(){
        return $this->belongsToMany('App\Vaccine', 'pets_vaccines')->withPivot('scheduled_date', 'scheduled_time', 'id');
    }

    public function cages(){
        return $this->hasMany(Cage::class);
    }

    public function dewormings(){
        return $this->hasMany(Deworming::class);
    }

    public function vets(){
        return $this->belongsToMany('App\Vet', 'pets_vets')->withPivot('id', 'symptom', 'diagnostic', 'description', 'date', 'created_at', 'updated_at');
    }

    public static function pets($id){
        return Pet::where('client_id', '=', $id)->get();
    }

    public function exampets(){
        return $this->hasMany(ExamPet::class);
    }

}
