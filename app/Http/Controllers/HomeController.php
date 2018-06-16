<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Caffeinated\Shinobi\Models\Role;
use Shinobi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Si el rol es waynakay, ve al dashboard de waynakay 
        if (Shinobi::isRole('waynakay')) {
            return view('admin.users.dashboard');
        // De lo contrario si el rol es padre ve al dashboard de padre
        } elseif (Shinobi::isRole('padre')) {
            return view('admin.fathers.dashboard');
        // De lo contrario si no tiene ningun rol, entonces ve a la vista home, para usuarios nuevos
        } elseif (!Shinobi::isRole('padre') || !Shinobi::isRole('waynakay') ) {
            return view('home');
        } // Aqui iremos rellenando segun los roles.
        
    }
}
