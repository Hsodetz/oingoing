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
    }
}
