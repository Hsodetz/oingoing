<?php

namespace App;

use App\School;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'user_id', 'school_id', 'profession', 'level_study', 'image',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

}
