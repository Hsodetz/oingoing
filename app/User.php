<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Caffeinated\Shinobi\Models\Role; //Hacemos uso para usar Role::
use App\City;
use App\Provincia;
use App\User;
use App\Father;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'province_id',
        'city_id',
        'name', 
        'lastname',
        'username', 
        'age', 
        'email', 
        'password', 
        'identification_document',
        'address',
        'phone_mobile',
        'phone_house',
        'sex',
        'nationality',
        'occupation',
        'civil_status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);// se debe usar de esta manera para tabla pivote
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function province()
    {
        return $this->belongsTo(Provincia::class);
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function father()
    {
        return $this->belongsTo(Father::class);
    }
 
}
