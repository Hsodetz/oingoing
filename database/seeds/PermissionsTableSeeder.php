<?php

use Illuminate\Database\Seeder;

use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users, aqui creamos el seeder para los usuarios
        Permission::create([
            'name'          => 'Navegar usuarios',
            'slug'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios del sistema'   
        ]);

        
         Permission::create([
            'name'          => 'Ver detalle del usuarios',
            'slug'          => 'users.show',
            'description'   => 'Ver en detalle cada usuario del sistema'   
        ]);

         
         Permission::create([
            'name'          => 'Edicion de usuario',
            'slug'          => 'users.edit',
            'description'   => 'Editar cualquier dato de un usuario del sistema'   
        ]);

        
         Permission::create([
            'name'          => 'Eliminar usuario',
            'slug'          => 'users.destroy',
            'description'   => 'Eliminar cualquier usuario del sistema'   
        ]);

         //Roles, aqui creamos el seeder para los roles de usuario
         Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema'   
        ]);

        
        Permission::create([
            'name'          => 'Ver detalle del roles',
            'slug'          => 'roles.show',
            'description'   => 'Ver en detalle cada rol del sistema'   
        ]);

        Permission::create([
            'name'          => 'Creacion de roles',
            'slug'          => 'roles.create',
            'description'   => 'Editar cualquier dato de un rol del sistema'   
        ]);
         
         Permission::create([
            'name'          => 'Edicion de roles',
            'slug'          => 'roles.edit',
            'description'   => 'Editar cualquier dato de un rol del sistema'   
        ]);

        
         Permission::create([
            'name'          => 'Eliminar rol',
            'slug'          => 'roles.destroy',
            'description'   => 'Eliminar cualquier rol del sistema'   
        ]);

        //Colegios, aqui creamos el seeder para los colegios
        Permission::create([
            'name'          => 'Navegar colegios',
            'slug'          => 'schools.index',
            'description'   => 'Lista y navega todos los colegios del sistema'   
        ]);

        
         Permission::create([
            'name'          => 'Ver detalle del colegios',
            'slug'          => 'schools.show',
            'description'   => 'Ver en detalle cada colegio del sistema'   
        ]);

        Permission::create([
            'name'          => 'Creacion de colegios',
            'slug'          => 'schools.create',
            'description'   => 'Editar cualquier dato de un colegio del sistema'   
        ]);
         
         Permission::create([
            'name'          => 'Edicion de colegios',
            'slug'          => 'schools.edit',
            'description'   => 'Editar cualquier dato de un colegio del sistema'   
        ]);

        
         Permission::create([
            'name'          => 'Eliminar colegio',
            'slug'          => 'schools.destroy',
            'description'   => 'Eliminar cualquier colegio del sistema'   
        ]);

        //Padres, aqui creamos el seeder para los padres
        Permission::create([
            'name'          => 'Navegar padres',
            'slug'          => 'fathers.index',
            'description'   => 'Lista y navega todos los padres del sistema'   
        ]);

        
         Permission::create([
            'name'          => 'Ver detalle del padres',
            'slug'          => 'fathers.show',
            'description'   => 'Ver en detalle cada padre del sistema'   
        ]);

        Permission::create([
            'name'          => 'Creacion de padres',
            'slug'          => 'fathers.create',
            'description'   => 'Editar cualquier dato de un padre del sistema'   
        ]);
         
         Permission::create([
            'name'          => 'Edicion de padres',
            'slug'          => 'fathers.edit',
            'description'   => 'Editar cualquier dato de un padre del sistema'   
        ]);

        
         Permission::create([
            'name'          => 'Eliminar padre',
            'slug'          => 'fathers.destroy',
            'description'   => 'Eliminar cualquier padre del sistema'   
        ]);

        //Profesores, aqui creamos el seeder para los Profesores
        Permission::create([
            'name'          => 'Navegar Profesores',
            'slug'          => 'teachers.index',
            'description'   => 'Lista y navega todos los Profesores del sistema'   
        ]);

        
         Permission::create([
            'name'          => 'Ver detalle del Profesores',
            'slug'          => 'teachers.show',
            'description'   => 'Ver en detalle cada profesor del sistema'   
        ]);

        Permission::create([
            'name'          => 'Creacion de Profesores',
            'slug'          => 'teachers.create',
            'description'   => 'Editar cualquier dato de un profesor del sistema'   
        ]);
         
         Permission::create([
            'name'          => 'Edicion de Profesores',
            'slug'          => 'teachers.edit',
            'description'   => 'Editar cualquier dato de un profesor del sistema'   
        ]);

        
         Permission::create([
            'name'          => 'Eliminar profesor',
            'slug'          => 'teachers.destroy',
            'description'   => 'Eliminar cualquier profesor del sistema'   
        ]);


        //Estudiantes, aqui creamos el seeder para los Estudiantes
        Permission::create([
            'name'          => 'Navegar Estudiantes',
            'slug'          => 'students.index',
            'description'   => 'Lista y navega todos los Estudiantes del sistema'   
        ]);

        
         Permission::create([
            'name'          => 'Ver detalle del Estudiantes',
            'slug'          => 'students.show',
            'description'   => 'Ver en detalle cada estudiante del sistema'   
        ]);

        Permission::create([
            'name'          => 'Creacion de Estudiantes',
            'slug'          => 'students.create',
            'description'   => 'Editar cualquier dato de un estudiante del sistema'   
        ]);
         
         Permission::create([
            'name'          => 'Edicion de Estudiantes',
            'slug'          => 'students.edit',
            'description'   => 'Editar cualquier dato de un estudiante del sistema'   
        ]);

        
         Permission::create([
            'name'          => 'Eliminar profesor',
            'slug'          => 'students.destroy',
            'description'   => 'Eliminar cualquier estudiante del sistema'   
        ]);
 
    }
    
}
