<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Provincia;
use App\City;

class City extends Model
{
    //
    protected $fillable = [
        'provincia_id', 'name',
    ];

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

     //Creamos un metodo para consultar y/o traer todas las ciudades de acuerdo al id de las provincias
     public static function cities($id)
     {   
         return City::where('provincia_id', $id)->get();
     }

}
