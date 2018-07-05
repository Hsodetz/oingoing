<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get("/home", 'HomeController@show')->name('home');
Route::get("/home/register", 'HomeController@register')->name('home.register');


//Ruta para el select dependiente.
Route::get('cities/{id}', 'Auth\RegisterController@getCities');

// creamos una ruta para llevarnos a la vista de crear usuario.
//Route::get('/users/create', 'UserController@create')->name('users.create');
Route::group(['middleware' => ['auth']], function(){

//Rutas para los usuarios
Route::get('users', 'Admin\UserController@index')->name('users.index')
        ->middleware('permission:users.index');

//Ruta para ver los detalles de un rol
Route::get('users/{user}', 'Admin\UserController@show')->name('users.show')
        ->middleware('permission:users.show');
//Ruta para actualizar un usuario por su id
Route::put('users/{user}', 'Admin\UserController@update')->name('users.update')
        ->middleware('permission:users.edit');
//Ruta para editar un usuario
Route::get('users/{user}/edit', 'Admin\UserController@edit')->name('users.edit')
        ->middleware('permission:users.edit');
Route::delete('users/{user}', 'Admin\UserController@destroy')->name('users.destroy')
        ->middleware('permission:users.destroy');


//Rutas para los roles
// Ruta para listar todos los roles
Route::get('roles', 'Admin\RoleController@index')->name('roles.index')
        ->middleware('permission:roles.index');

//Ruta para ver los detalles de un rol
Route::get('roles/{role}', 'Admin\RoleController@show')->name('roles.show')
        ->middleware('permission:roles.show');
//Ruta para almacenar los datos luego de ser introducidos en el formulario
Route::post('roles/store', 'Admin\RoleController@store')->name('roles.store')
        ->middleware('permission:roles.create');
//Ruta para mostrar el formulario de creacion de registro de roles
Route::get('role/create', 'Admin\RoleController@create')->name('roles.create')
        ->middleware('permission:roles.create');
//Ruta para actualizar un rol por su id
Route::put('roles/{role}', 'Admin\RoleController@update')->name('roles.update')
        ->middleware('permission:roles.edit');
//Ruta para editar un rol
Route::get('roles/{role}/edit', 'Admin\RoleController@edit')->name('roles.edit')
        ->middleware('permission:roles.edit');
Route::delete('roles/{role}', 'Admin\RoleController@destroy')->name('roles.destroy')
        ->middleware('permission:roles.destroy');

//Rutas para los permisos
// Ruta para listar todos los permisos
Route::get('permissions', 'Admin\PermissionController@index')->name('permissions.index')
        ->middleware('permission:permissions.index');

//Ruta para ver los detalles de un rol
Route::get('permissions/{permission}', 'Admin\PermissionController@show')->name('permissions.show')
        ->middleware('permission:permissions.show');
//Ruta para almacenar los datos luego de ser introducidos en el formulario
Route::post('permissions/store', 'Admin\PermissionController@store')->name('permissions.store')
        ->middleware('permission:permissions.create');
//Ruta para mostrar el formulario de creacion de registro de roles
Route::get('permission/create', 'Admin\PermissionController@create')->name('permissions.create')
        ->middleware('permission:permissions.create');
//Ruta para actualizar un rol por su id
Route::put('permissions/{permission}', 'Admin\PermissionController@update')->name('permissions.update')
        ->middleware('permission:permissions.edit');
//Ruta para editar un rol
Route::get('permissions/{permission}/edit', 'Admin\PermissionController@edit')->name('permissions.edit')
        ->middleware('permission:permissions.edit');
Route::delete('permissions/{permission}', 'Admin\PermissionController@destroy')->name('permissions.destroy')
        ->middleware('permission:permissions.destroy');


//Rutas para los colegios
// Ruta para listar todos los colegios
Route::get('schools', 'Admin\SchoolController@index')->name('schools.index')
        ->middleware('permission:schools.index');

//Ruta para ver los detalles de un colegio
Route::get('schools/{school}', 'Admin\SchoolController@show')->name('schools.show')
        ->middleware('permission:schools.show');
//Ruta para almacenar los datos luego de ser introducidos en el formulario
Route::post('schools/store', 'Admin\SchoolController@store')->name('schools.store')
        ->middleware('permission:schools.create');
//Ruta para mostrar el formulario de creacion de registro de colegios
Route::get('school/create', 'Admin\SchoolController@create')->name('schools.create')
        ->middleware('permission:schools.create');
//Ruta para actualizar un colegio por su id
Route::put('schools/{school}', 'Admin\SchoolController@update')->name('schools.update')
        ->middleware('permission:schools.edit');
//Ruta para editar un colegio
Route::get('schools/{school}/edit', 'Admin\SchoolController@edit')->name('schools.edit')
        ->middleware('permission:schools.edit');
Route::delete('schools/{school}', 'Admin\SchoolController@destroy')->name('schools.destroy')
        ->middleware('permission:schools.destroy');

//Rutas para los padres
// Ruta para listar todos los padres
Route::get('fathers', 'Admin\FatherController@index')->name('fathers.index')
        ->middleware('permission:fathers.index');
//Ruta para ver los detalles de un padre
Route::get('fathers/{father}', 'Admin\FatherController@show')->name('fathers.show')
        ->middleware('permission:fathers.show');
//Ruta para almacenar los datos luego de ser introducidos en el formulario
Route::post('fathers/store', 'Admin\FatherController@store')->name('fathers.store')
        ->middleware('permission:fathers.create');
//Ruta para mostrar el formulario de creacion de registro de colegios
Route::get('father/create', 'Admin\FatherController@create')->name('fathers.create')
        ->middleware('permission:fathers.create');
//Ruta para actualizar un colegio por su id
Route::put('fathers/{father}', 'Admin\FatherController@update')->name('fathers.update')
        ->middleware('permission:fathers.edit');
//Ruta para editar un colegio
Route::get('fathers/{father}/edit', 'Admin\FatherController@edit')->name('fathers.edit')
        ->middleware('permission:fathers.edit');
Route::delete('fathers/{father}', 'Admin\FatherController@destroy')->name('fathers.destroy')
        ->middleware('permission:fathers.destroy');


//Rutas para los profesores
// Ruta para listar todos los profesores
Route::get('teachers',                  'Admin\TeacherController@index')->name('teachers.index')->middleware('permission:teachers.index');
//Ruta para ver los detalles de un profesor
Route::get('teachers/{teacher}',         'Admin\TeacherController@show')->name('teachers.show')->middleware('permission:teachers.show');
//Ruta para almacenar los datos luego de ser introducidos en el formulario
Route::post('teachers/store',           'Admin\TeacherController@store')->name('teachers.store')->middleware('permission:teachers.create');
//Ruta para mostrar el formulario de creacion de registro de profesores
Route::get('teacher/create',            'Admin\TeacherController@create')->name('teachers.create')->middleware('permission:teachers.create');
//Ruta para actualizar un profesor por su id
Route::put('teachers/{teacher}',         'Admin\TeacherController@update')->name('teachers.update')->middleware('permission:teachers.edit');
//Ruta para editar un profesor
Route::get('teachers/{teacher}/edit',    'Admin\TeacherController@edit')->name('teachers.edit')->middleware('permission:teachers.edit');
Route::delete('teachers/{teacher}',      'Admin\TeacherController@destroy')->name('teachers.destroy')->middleware('permission:teachers.destroy');

//Rutas para los estudiantes
// Ruta para listar todos los estudiantes
Route::get('students',                  'Admin\StudentController@index')->name('students.index')->middleware('permission:students.index');
//Ruta para ver los detalles de un estudiante
Route::get('students/{father}',         'Admin\StudentController@show')->name('students.show')->middleware('permission:students.show');
//Ruta para almacenar los datos luego de ser introducidos en el formulario
Route::post('students/store',           'Admin\StudentController@store')->name('students.store')->middleware('permission:students.create');
//Ruta para mostrar el formulario de creacion de registro de estudiantes
Route::get('student/create',            'Admin\StudentController@create')->name('students.create')->middleware('permission:students.create');
//Ruta para actualizar un estudiante por su id
Route::put('students/{student}',         'Admin\StudentController@update')->name('students.update')->middleware('permission:students.edit');
//Ruta para editar un estudiante
Route::get('students/{student}/edit',    'Admin\StudentController@edit')->name('students.edit')->middleware('permission:students.edit');
//Ruta para eliminar un estudiante
Route::delete('students/{student}',      'Admin\StudentController@destroy')->name('students.destroy')->middleware('permission:students.destroy');


//Rutas para los periodos
// Ruta para listar todos los periodos
Route::get('periods', 'Admin\PeriodController@index')->name('periods.index')
        ->middleware('permission:periods.index');

//Ruta para ver los detalles de un periodo
Route::get('periods/{school}', 'Admin\PeriodController@show')->name('periods.show')
        ->middleware('permission:periods.show');
//Ruta para almacenar los datos luego de ser introducidos en el formulario
Route::post('periods/store', 'Admin\PeriodController@store')->name('periods.store')
        ->middleware('permission:periods.create');
//Ruta para mostrar el formulario de creacion de registro de periodos
Route::get('period/create', 'Admin\PeriodController@create')->name('periods.create')
        ->middleware('permission:periods.create');
//Ruta para actualizar un periodo por su id
Route::put('periods/{school}', 'Admin\PeriodController@update')->name('periods.update')
        ->middleware('permission:periods.edit');
//Ruta para editar un periodo
Route::get('periods/{school}/edit', 'Admin\PeriodController@edit')->name('periods.edit')
        ->middleware('permission:periods.edit');
Route::delete('periods/{school}', 'Admin\PeriodController@destroy')->name('periods.destroy')
        ->middleware('permission:periods.destroy');

});


