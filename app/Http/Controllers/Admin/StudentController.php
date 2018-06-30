<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use RealRashid\SweetAlert\Facades\Alert;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Intervention\Image\ImageManager;
use Shinobi;
use App\Student;
use App\School;
use App\User;
use App\Father;
use Auth;
use Redirect;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Shinobi::isRole('Estudiante')) {
            return view('admin.students.show');
        }elseif(Shinobi::isRole('waynakay') or Shinobi::isRole('admin')){
            $students = User::all();
            $roles = Role::all();
           
            return view('admin.students.index', compact('students', 'roles'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = Student::where('user_id', Auth::user()->id)->first(); // le pasamos el estudiante para identificar la foto del usuario en el sidebar
        $schools = School::orderBy('name', 'ASC')->pluck('name', 'id');

        $role = Role::where('name', 'Padre')->first();
        //dd($role->id);
        $role_users = DB::table('role_user')->where('role_id', $role->id)->get();
        foreach($role_users as $key=>$value){
            dd($key, $value);
        }
        $users = User::all();
        
        //Si el rol es estudiante, puede agregar atributos al modelo estudiante
        if (Shinobi::isRole('Estudiante')) {
            return view('admin.students.create', compact('schools', 'student', 'users', 'role_users'));
        }else{
            Alert::error('Accion no disponible', 'No puedes agregar atributos al padre, solo el puede hacerlo')->autoclose(5000);
            return Redirect::route('students.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $users = User::all();
        //dd($user->id);
        $student = Student::where('user_id', $user->id)->first(); // con first me traigo el array de father, con get me traigo la coleccion
        //dd($father);
        if(Shinobi::isRole('Estudiante') and $user->id != Auth::user()->id ){
            Alert::error('Accion no disponible', 'No puedes ver los atributos de otros padres')->autoclose(2000);
            return redirect()->route('fathers.show', Auth::user()->id);
        }else{
            return view('admin.students.show', compact('user', 'student'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
