<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Caffeinated\Shinobi\Models\Role; //Hacemos uso para usar Role::
use App\Father;
use App\User;

class Student extends Model
{
    protected $fillable = [
        'user_id', 'school_id', 'registration_number', 'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

}
