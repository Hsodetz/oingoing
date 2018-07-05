<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

	
use Illuminate\Support\Collection as Collection;
use RealRashid\SweetAlert\Facades\Alert;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Intervention\Image\ImageManager;
use Image;
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
        // Si el rol es estudiante, retornar la vista Show (Dashboard) del estudiante logueado
        if (Shinobi::isRole('Estudiante')) {
            return view('admin.students.show');
        // de lo contrario si el rol es waynakay o admin
        }elseif(Shinobi::isRole('Waynakay') or Shinobi::isRole('Admin')){
            // Obtenemos el rol con nombre estudiante
            $role = Role::where('name', 'Estudiante')->first();
            // Obtenemos el usuario con el role_id estudiante, para listar solo los estudiantes
            $students = User::where('role_id', $role->id)->get();
           
            return view('admin.students.index', compact('students'));
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
        $users = User::where('role_id', $role->id)->pluck('name', 'id');
        //dd(users);
     
        //Si el rol es estudiante, puede agregar atributos al modelo estudiante
        if (Shinobi::isRole('Estudiante')) {
            return view('admin.students.create', compact('schools', 'student', 'users'));
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
        //dd($request);
        $student = new Student;

        $student->user_id                    = $request->user_id;
        $student->school_id                  = $request->school_id;
        $student->father_user_id             = $request->father_user_id;
        $student->registration_number        = $request->registration_number;

        //dd($request);
        //si existe la nueva imagen que viene de actualizacion, guardela en el directorio
        if ($request->file('image')) {
            //dd("si hay imagen");
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(700, 600)->save(public_path( 'imagenes/estudiantes/'.$filename));
            $student->image = $filename;
        }

        $student->save();

        Alert::toast('El estudiante se ha creado satisfactoriamente!', 'success', 'top-right')->autoclose(8000);
        return Redirect::route('students.show', Auth::user()->id);
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
        
        //dd($student);
        if(Shinobi::isRole('Estudiante') and $user->id != Auth::user()->id ){
            Alert::error('Accion no disponible', 'No puedes ver los atributos de otros estudiantes')->autoclose(2000);
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
        $student = User::findOrFail($id);
        //dd($student->id);
        if (Shinobi::isRole('Estudiante')) {
            return view('admin.students.edit', compact('student'));
        }elseif(Shinobi::isRole('Waynakay') or Shinobi::isRole('Admin')){
            $role = Role::where('name', 'Padre')->first(); //Obtenemos el id del rol padre
            $users = User::where('role_id', $role->id)->pluck('name', 'id'); // filtramos los usuarios por rol padre, segun su id
            $schools = School::orderBy('name', 'ASC')->pluck('name', 'id');

            return view('admin.students.edit', compact('users', 'student', 'schools'));
        }else{
            Alert::error('Accion no disponible', 'No puedes editar atributos al padre, solo el puede hacerlo')->autoclose(5000);
            return Redirect::route('students.index');
        }
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
        if ($request->id == "") {
            //dd($request);
            $this->store($request);
        }
        //dd($request->user_id);
        $student = Student::find($id);
      
        dd($student);
        $student->user_id                    = $request->user_id;
        $student->school_id                  = $request->school_id;
        $student->father_user_id             = $request->father_user_id;
        $student->registration_number        = $request->registration_number;

        //si existe la imagen la eliminamos del directorio
        if (File::exists(public_path("/imagenes/estudiantes/$student->image"))) {
            File::delete(public_path( "/imagenes/estudiantes/$student->image"));
        }
        dd($request);
        //si existe la nueva imagen que viene de actualizacion, guardela en el directorio
        if ($request->file('image')) {
            //dd("si hay imagen");
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(700, 600)->save(public_path( 'imagenes/estudiantes/'.$filename));
            $student->image = $filename;
        }

        $student->save();

        Alert::toast('El estudiante se ha actualizado satisfactoriamente!', 'success', 'top-right')->autoclose(8000);
        return Redirect::route('students.show', Auth::user()->id);
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
