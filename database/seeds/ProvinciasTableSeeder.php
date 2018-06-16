<?php

use Illuminate\Database\Seeder;

use App\Provincia;

class ProvinciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provincia::create([
        'name' => 'Azuay', 
        ]);

        Provincia::create([
            'name' => 'Bolivar', 
        ]);

        Provincia::create([
            'name' => 'Cañar', 
        ]);

        Provincia::create([
            'name' => 'Carchi', 
        ]);

        Provincia::create([
            'name' => 'Cotopaxi', 
        ]);

        Provincia::create([
            'name' => 'Chimborazo', 
        ]);

        Provincia::create([
            'name' => 'El Oro', 
        ]);

        Provincia::create([
            'name' => 'Esmeraldas', 
        ]);

        Provincia::create([
            'name' => 'Guayas', 
        ]);

        Provincia::create([
            'name' => 'Imbabura', 
        ]);

        Provincia::create([
            'name' => 'Loja', 
        ]);

        Provincia::create([
            'name' => 'Los Rios', 
        ]);

        Provincia::create([
            'name' => 'Manabi', 
        ]);

        Provincia::create([
            'name' => 'Morona Santiago', 
        ]);

        Provincia::create([
            'name' => 'Napo', 
        ]);

        Provincia::create([
            'name' => 'Pastaza', 
        ]);

        Provincia::create([
            'name' => 'Pichincha', 
        ]);

        Provincia::create([
            'name' => 'Tungurahua', 
        ]);

        Provincia::create([
            'name' => 'Zamora Chinchipe', 
        ]);

        Provincia::create([
            'name' => 'Galapagos', 
        ]);

        Provincia::create([
            'name' => 'Sucumbios', 
        ]);

        Provincia::create([
            'name' => 'Orellana', 
        ]);

        Provincia::create([
            'name' => 'Santo Domingo de las Tashilas', 
        ]);

        Provincia::create([
            'name' => 'Santa Elena', 
        ]);
    }
}
