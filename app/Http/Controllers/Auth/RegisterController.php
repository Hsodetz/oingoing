<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Provincia;
use App\City;
use Caffeinated\Shinobi\Models\Role; //Hacemos uso para usar Role::
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showRegistrationForm()
    {
        $provincias = Provincia::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('auth.register', compact('provincias'));
    }

    // Metodo creado para el select dependiente, recibimos el id, y mandamos las ciudades con ese id.
    public function getCities(Request $request, $id)
    {
        if($request->ajax()){
            $cities = City::cities($id);
            return response()->json($cities);
        };
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'                      => 'required|string|max:255',
            'lastname'                  => 'required|string|max:255',
            'username'                  => 'required|string|max:50|unique:users',
            'age'                       => 'required|min:1,max:3',
            'email'                     => 'required|string|email|max:255|unique:users',
            'password'                  => 'required|string|min:6|confirmed',
            'identification_document'   => 'required|string|min:4',
            'province_id'               => 'required|string',
            'city_id'                   => 'required|string',
            'address'                   => 'required|min:4',
            'phone_mobile'              => 'required|min:4',
            'phone_house'               => 'required|min:4',
            'sex'                       => 'required',
            'nationality'               => 'required|min:4',
            'occupation'                => 'required',
            'civil_status'              => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'                      => $data['name'],
            'lastname'                  => $data['lastname'],
            'username'                  => $data['username'],
            'age'                       => $data['age'],
            'email'                     => $data['email'],
            'password'                  => bcrypt($data['password']),
            'identification_document'   => $data['identification_document'],
            'province_id'               => $data['province_id'],
            'city_id'                   => $data['city_id'],
            'address'                   => $data['address'],
            'phone_mobile'              => $data['phone_mobile'],
            'phone_house'               => $data['phone_house'],
            'sex'                       => $data['sex'],
            'nationality'               => $data['nationality'],
            'occupation'                => $data['occupation'],
            'civil_status'              => $data['civil_status'],
        ]);
    }

    // Agregamos la funcion de registro, para poder registrar sin que entre el nuevo usuario, osea se quede el que esta registrando
    public function register(Request $request)
    { 
        $this->validator($request->all())->validate();
        
        event(new Registered($user = $this->create($request->all())));
        
        //$this->guard()->login($user);
        Alert::success("Exito", 'El nuevo usuario ya se encuentra registrado, ahora debes asignarle un rol')->autoclose(8000);
        return redirect()->route('users.index');                    
    }

    // Funcion para redirijir al login despues de haber registrado un usuario.
    // Solo se usa si no usamos la funcion de register, que se encuentra arrriba
    protected function registered(Request $request, $user)
    {
        //dd(Auth()->user()->username);
        Alert::success("Bienvenid@ " .Auth()->user()->name, 'Te encuentras ya registrado en nuestro sistema')->autoclose(5000);
        sleep(1);
        Auth::logout();
        return redirect()->route('login');
    }
}
