<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use RealRashid\SweetAlert\Facades\Alert;
use App\School;
use App\City;
use Redirect;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::orderBy('id', 'DESC')->get();
        return view('admin.schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.schools.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $school = School::create($request->all());

        Alert::toast("El colegio {$school->name} ha sido creado correctamente!", 'success', 'top-right')->autoclose(8000);
        return Redirect::route('schools.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::findOrFail($id);

        return view('admin.schools.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = School::findOrFail($id);
        $cities = City::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.schools.edit', compact('school', 'cities'));
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
        $school = School::findOrFail($id);

        $school->update($request->all());

        Alert::toast("El colegio {$school->name} se ha actualizado correctamente!", 'info', 'top-right')->autoclose(8000);
        return Redirect::route('schools.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = School::findOrFail($id);

        $school->delete();
        Alert::toast("El colegio {$school->name} se ha eliminado correctamente!", 'info', 'top-right')->autoclose(8000);
        return Redirect::route('schools.index');
    }
}
