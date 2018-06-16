<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use RealRashid\SweetAlert\Facades\Alert;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Shinobi;
use App\Father;
use App\User;
use Auth;

class FatherController extends Controller
{

    public function dashboard()
    {
        return view('admin.fathers.dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Shinobi::isRole('padre')) {
            //$fathers = User::where('id', Auth::user()->id)->get();
            return view('admin.fathers.dashboard');
        }elseif(Shinobi::isRole('waynakay') or Shinobi::isRole('admin')){
            $fathers = User::all();
            //Alert::error('Accion no disponible', 'No puedes ver los atributos de otros padres')->autoclose(2000);
            return view('admin.fathers.index', compact('fathers'));
        }  
       
        //dd($fathers);
        
        //return view('admin.fathers.index', compact('fathers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $father = User::findOrFail($id);
        $fathers = User::all();
        if (Shinobi::isRole('padre') and $father->id == Auth::user()->id) {
            return view('admin.fathers.show', compact('father'));
        }elseif(Shinobi::isRole('padre') and $father->id != Auth::user()->id ){
            Alert::error('Accion no disponible', 'No puedes ver los atributos de otros padres')->autoclose(2000);
            return view('admin.fathers.index', compact('fathers'));
        }else{
            return view('admin.fathers.show', compact('father'));
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
