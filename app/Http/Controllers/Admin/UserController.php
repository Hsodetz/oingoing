<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use RealRashid\SweetAlert\Facades\Alert;
use Caffeinated\Shinobi\Models\Role; //Hacemos uso para usar Role::
use Caffeinated\Shinobi\Models\Permission;
use App\User;
use App\Provincia;
use App\City;
use App\Father;
use Auth;
use Shinobi;
use Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        $roles = Role::get();

        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Shinobi::isRole('waynakay') || Shinobi::isRole('admin')) {
            $user = User::findOrFail($id);
            $roles = $user->roles;
            
            return view('admin.users.show', compact('user', 'roles', 'cities', 'provinces'));
        }else{
            $id = Auth::user()->id;
            $user = User::find($id);
            $father = Father::where('user_id', $user->id)->first(); 
            //dd($father);
            //dd($user);
            return view('admin.users.show', compact('user', 'father'));
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
        $user = User::findOrFail($id);
        $provinces = Provincia::orderBy('name', 'ASC')->pluck('name', 'id');
        $cities = City::orderBy('name', 'ASC')->pluck('name', 'id');
        $roles = Role::get();
        return view('admin.users.edit', compact('user', 'provinces', 'cities', 'roles'));
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
        // obtenemos el numero de array en roles, y verificamos si mayor a uno o cero, dependiendo del mismo ejecutamos la accion
        $numeroDeRoles = count($request->roles);
        if ($numeroDeRoles > 1) {
            Alert::toast('Debe seleccionar un solo rol de usuario!', 'error', 'top-right')->autoclose(15000);
            return redirect()->route('users.edit', $id);
        }elseif($numeroDeRoles == 0){
            Alert::toast('Debe seleccionar un rol de usuario!', 'error', 'top-right')->autoclose(15000);
            return redirect()->route('users.edit', $id);
        }

        $user = User::findOrFail($id);

        //Primero que se actualice el usuario
        $user->update($request->all());
        //Luego que se actualicen los roles, sincronizamos los datos que pasamos con el campo roles
        $user->roles()->sync($request->get('roles'));

        Alert::toast('Usuario actualizado satisfactoriamente!', 'success', 'top-right')->autoclose(8000);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Alert::toast('Usuario eliminado satisfactoriamente!', 'success', 'top-right')->autoclose(8000);
        return Redirect::route('users.index');
    }
}
