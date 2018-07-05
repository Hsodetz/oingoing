<?php

use Illuminate\Database\Seeder;

use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'          => 'Waynakay',
            'slug'          => 'waynakay',
            'description'   => 'Administrador con accesso total al sistema',
            'special'       => 'all-access',
        ]);

        Role::create([
            'name'          => 'Padre',
            'slug'          => 'padre',
            'description'   => 'Rol para acceso a padres',
            'special'       => 'no-access',
        ]);

        Role::create([
            'name'          => 'Profesor',
            'slug'          => 'profesor',
            'description'   => 'Rol para acceso a profesores',
            'special'       => 'no-access',
        ]);

        Role::create([
            'name'          => 'Estudiante',
            'slug'          => 'estudiante',
            'description'   => 'Rol para acceso a estudiantes',
            'special'       => 'no-access',
        ]);
    }
}
