<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $table = 'periods';

    protected $fillable = [
        'name', 'date_ini', 'date_end', 'status',
    ]; 
}
