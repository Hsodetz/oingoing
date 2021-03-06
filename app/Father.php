<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Caffeinated\Shinobi\Models\Role; //Hacemos uso para usar Role::
use App\User;
use App\Student;

class Father extends Model
{
    protected $table = 'fathers';

    protected $fillable = [
        'user_id', 'school_id', 'work_address', 'work_phone', 'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

}
