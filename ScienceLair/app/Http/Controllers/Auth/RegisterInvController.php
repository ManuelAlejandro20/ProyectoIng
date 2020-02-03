<?php

namespace App\Http\Controllers\Auth;

use App\Investigator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterInvController extends Controller
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showRegistrationForm()
    {
        return view('auth.registerinv');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|regex:/^[a-zA-Záéíóú]+\s([a-zA-Záéíóú]+\s?)+$/|max:255',
        'secondname' => 'required|regex:/^[a-zA-Záéíóú]+\s([a-zA-Záéíóú]+\s?)+$/|max:255',
        'passportnumber'  => 'required|string'
        ]);


        event(new Registered($user = $this->create($request->all())));

        session()->flash('inv', 'El investigador fue ingresado correctamente');

        return redirect($this->redirectPath());
    }

    public function redirectPath()
    {
        $user_type = Auth::user()->user_type;
        if ($user_type == 'INVESTIGADOR') {
            return '/home';
        }
        return '/homeadmin';
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Investigator::create([
            'name' => strtoupper($data['name']),
            'secondname' => strtoupper($data['secondname']),
            'passportnumber' => $data['passportnumber'],
            'state' => $data['state'],
            'associatedunit' => $data['associatedunit'],
        ]);
    }
}
