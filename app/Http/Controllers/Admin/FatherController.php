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
use Auth;
use Redirect;

class FatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Shinobi::isRole('padre')) {
            return view('admin.fathers.show');
        }elseif(Shinobi::isRole('waynakay') or Shinobi::isRole('admin')){
            $fathers = User::all();
            $roles = Role::all();
           
            return view('admin.fathers.index', compact('fathers', 'roles'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $father = Father::where('user_id', Auth::user()->id)->first(); // le pasamos el padre para identificar la foto del usuario en el sidebar
        $schools = School::orderBy('name', 'ASC')->pluck('name', 'id');
        //Si el rol es padre, puede agregar atributos al modelo padre
        if (Shinobi::isRole('Padre')) {
            return view('admin.fathers.create', compact('schools', 'father'));
        }else{
            Alert::error('Accion no disponible', 'No puedes agregar atributos al padre, solo el puede hacerlo')->autoclose(5000);
            return Redirect::route('fathers.index');
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

        $father = new Father;
        $father->user_id        = $request->user_id;
        $father->school_id      = $request->school_id;
        $father->work_address   = $request->work_address;
        $father->work_phone     = $request->work_phone;

        //Si viene una imagen
        if ($request->file('image')) {
            //dd($request->file('image'));
            $imagen = $request->file('image');
            $filename = time() . '.' . $imagen->getClientOriginalExtension();
            Image::make($imagen)->resize(700, 600)->save(public_path('imagenes/padres/'.$filename));
            $father->image = $filename;
        }

        $father->save();

        Alert::toast('Los nuevos atributos del padre se han creado satisfactoriamente!', 'success', 'top-right')->autoclose(8000);
        return Redirect::route('fathers.show', compact('user'));
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
        $father = Father::where('user_id', $user->id)->first(); // con first me traigo el array de father, con get me traigo la coleccion
        //dd($father);
        if(Shinobi::isRole('Padre') and $user->id != Auth::user()->id ){
            Alert::error('Accion no disponible', 'No puedes ver los atributos de otros padres')->autoclose(2000);
            return redirect()->route('fathers.show', Auth::user()->id);
        }else{
            return view('admin.fathers.show', compact('user', 'father'));
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
        $father = Father::where('user_id', $id)->first();
        $schools = School::orderBy('name', 'ASC')->pluck('name', 'id');
        //dd($father);
        if (Shinobi::isRole('padre')) {
            return view('admin.fathers.edit', compact('father', 'schools'));
        }else{
            Alert::error('Accion no disponible', 'No puedes editar atributos al padre, solo el puede hacerlo')->autoclose(5000);
            return Redirect::route('fathers.index');
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
        $father = Father::findOrFail($id);
        //dd($father);
        $father->user_id        = $request->user_id;
        $father->school_id      = $request->school_id;
        $father->work_address   = $request->work_address;
        $father->work_phone     = $request->work_phone;

        //si existe la imagen la eliminamos del directorio
        if (File::exists(public_path("/imagenes/padres/$father->image"))) {
            File::delete(public_path( "/imagenes/padres/$father->image"));
        }

        //si existe la nueva imagen que viene de actualizacion, guardela en el directorio
        if ($request->file('image')) {
            //dd("si hay imagen");
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(700, 600)->save(public_path( 'imagenes/padres/'.$filename));
            $father->image = $filename;
        }

        $father->save();

        Alert::toast('El padre se ha actualizado satisfactoriamente!', 'success', 'top-right')->autoclose(8000);
        return Redirect::route('fathers.show', Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $father = Father::findOrFail($id);
        $father->delete();

        if (File::exists(public_path("/imagenes/padres/$father->image"))) {
            //dd("si existe la imagen");
            File::delete(public_path( "/imagenes/padres/$father->image"));
        }

        Alert::toast('Los atributos del padre se han eliminado satisfactoriamente!', 'warning', 'top-right')->autoclose(8000);
        return Redirect::route('fathers.index');
    }
}
