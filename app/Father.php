<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Father extends Model
{
    protected $table = 'fathers';

    protected $fillable = [
        'user_id', 'work_address', 'work_phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
