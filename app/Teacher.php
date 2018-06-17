<?php

namespace App;

use App\School;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'school_id', 'name', 'lastname', 'phone', 'email', 'profession', 'level_study',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

}
