<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Caffeinated\Shinobi\Models\Role;
use Shinobi;
use Redirect;
use Auth;

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
      
        return view('home');

        // Si el rol es waynakay, ve al dashboard de waynakay 
        // if (Shinobi::isRole('waynakay')) {
        //    return view('admin.users.dashboard');
        // De lo contrario si el rol es padre ve al dashboard de padre
        //} elseif (Shinobi::isRole('padre')) {
        //    return view('admin.fathers.dashboard');
        // De lo contrario si no tiene ningun rol, entonces ve a la vista home, para usuarios nuevos
        //} elseif (!Shinobi::isRole('padre') || !Shinobi::isRole('waynakay') ) {
        //    return view('home');
        //} // Aqui iremos rellenando segun los roles.
      
        //return Redirect::route('users.show');
    }

    public function show()
    {
        //dd(Auth::user()->id);
        $user = Auth::user()->id;
        
        if (Shinobi::isRole('Waynakay')) {
            return redirect()->route('users.show', compact('user'));
        } elseif(Shinobi::isRole('Padre')) {
            return redirect()->route('fathers.show', compact('user'));
        } elseif(Shinobi::isRole('Profesor')) {
            return redirect()->route('teachers.show', compact('user'));
        } elseif(Shinobi::isRole('Estudiante')) {
            return redirect()->route('students.show', compact('user'));
        } else {
            return redirect()->route('home.register');
        }
        
        
        
    }

    // Metodo que se encarga de dirijir a la vista home al usuario luego de registrarse.
    public function register()
    {
        return view('home');
    }
}
