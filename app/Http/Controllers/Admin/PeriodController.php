<?php

namespace App\Http\Controllers\Admin;

use App\Period;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use RealRashid\SweetAlert\Facades\Alert;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $period = Period::orderBy('id', 'DESC')->get();
        return view('admin.period.index', compact('period'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $period = Period::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.period.create', compact('period'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $period = Period::create($request->all());

        Alert::toast("El periodo {$period->name} ha sido creado correctamente!", 'success', 'top-right')->autoclose(8000);
        return Redirect::route('periods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        $period = Period::findOrFail($id);

        return view('admin.periods.show', compact('period'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        $period = Period::findOrFail($id);
        return view('admin.periods.edit', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Period $period)
    {
        $period = Period::findOrFail($id);
        $period->update($request->all());
        Alert::toast("El periodo {$period->name} se ha actualizado correctamente!", 'info', 'top-right')->autoclose(8000);
        return Redirect::route('periods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        $period = Period::findOrFail($id);

        $period->delete();
        Alert::toast("El periodo {$period->name} se ha eliminado correctamente!", 'info', 'top-right')->autoclose(8000);
        return Redirect::route('periods.index');
    }
}