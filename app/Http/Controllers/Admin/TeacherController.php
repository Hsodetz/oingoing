<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use RealRashid\SweetAlert\Facades\Alert;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Intervention\Image\ImageManager;
use Image;
use File;
use Shinobi;
use App\Father;
use App\User;
use App\School;
use App\Teacher;
use Auth;
use Redirect;

class TeacherController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Shinobi::isRole('Profesor')) {
            return view('admin.teachers.show');
        }elseif(Shinobi::isRole('waynakay') or Shinobi::isRole('admin')){
            $teachers = User::all();
            $roles = Role::all();
           
            return view('admin.teachers.index', compact('teachers', 'roles'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::orderBy('name', 'ASC')->pluck('name', 'id');
        $teacher = Teacher::where('user_id', Auth::user()->id)->first(); 
        if (Shinobi::isRole('Profesor')) {
            return view('admin.teachers.create', compact('schools', 'teacher'));
        }else{
            Alert::error('Accion no disponible', 'No puedes agregar atributos al profesor, solo el puede hacerlo')->autoclose(5000);
            return Redirect::route('teachers.index');
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
        $user = User::find(Auth::user()->id);

        $teacher = new Teacher;
    
        // Llamamos al metodo siguiente, donde se encuentran los daos que se repiten en store y update
        $this->repeatStoreUpdate($request, $teacher);

        //dd($teacher);
        $teacher->save();

        Alert::toast('Los nuevos atributos del profesor se han creado satisfactoriamente!', 'success', 'top-right')->autoclose(8000);
        return Redirect::route('teachers.show', compact('user'));
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
        $teacher = Teacher::where('user_id', $user->id)->first(); // con first me traigo el array de father, con get me traigo la coleccion
        //dd($father);
        if(Shinobi::isRole('Profesor') and $user->id != Auth::user()->id ){
            Alert::error('Accion no disponible', 'No puedes ver los atributos de otros profesores')->autoclose(2000);
            return redirect()->route('teachers.show', Auth::user()->id);
        }else{
            return view('admin.teachers.show', compact('user', 'teacher'));
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
        $teacher = Teacher::where('user_id', $id)->first();
        $schools = School::orderBy('name', 'ASC')->pluck('name', 'id');
        //dd($father);
        if (Shinobi::isRole('Profesor')) {
            return view('admin.teachers.edit', compact('teacher', 'schools'));
        }else{
            Alert::error('Accion no disponible', 'No puedes editar atributos al profesor, solo el puede hacerlo')->autoclose(5000);
            return Redirect::route('teachers.index');
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
        $teacher = Teacher::find($id);

        //si existe la imagen la eliminamos del directorio
        if (File::exists(public_path("/imagenes/profesores/$teacher->image"))) {
            File::delete(public_path( "/imagenes/profesores/$teacher->image"));
        }

        // Llamamos al metodo siguiente, donde se encuentran los daos que se repiten en store y update
        $this->repeatStoreUpdate($request, $teacher);

        $teacher->save();

        Alert::toast('El Profesor se ha actualizado satisfactoriamente!', 'success', 'top-right')->autoclose(8000);
        return Redirect::route('teachers.show', Auth::user()->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        if (File::exists(public_path("/imagenes/profesores/$teacher->image"))) {
            //dd("si existe la imagen");
            File::delete(public_path( "/imagenes/profesores/$teacher->image"));
        }

        Alert::toast('Los atributos del profesor se han eliminado satisfactoriamente!', 'warning', 'top-right')->autoclose(8000);
        return Redirect::route('teachers.index');
    }

    private function repeatStoreUpdate($request, $teacher)
    {
        $teacher->user_id       = $request->user_id;
        $teacher->school_id     = $request->school_id;
        $teacher->profession    = $request->profession;
        $teacher->level_study   = $request->level_study;

        if ($request->file('image')) {
            $imagen = $request->file('image');
            $filename = time() . '.' . $imagen->getClientOriginalExtension();
            Image::make($imagen)->resize(300, 200)->save(public_path('imagenes/profesores/'.$filename));
            $teacher->image = $filename;
        }
    }
}
