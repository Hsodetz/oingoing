<?php

namespace App;

use App\City;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';

    protected $fillable = [
        'city_id', 'name', 'address',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
