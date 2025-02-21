<?php
// app/Http/Controllers/Auth/RegisterController.php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;  

class RegisterController extends Controller
{

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Validación de los datos del formulario
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'departamento' => ['required', 'string', 'max:255'],
            'categoria' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // Crear el usuario
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'apellidos' => $data['apellidos'],
            'departamento' => $data['departamento'],
            'categoria' => $data['categoria'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    // Método para registrar al usuario
    public function register(Request $request)
    {
        // Validar los datos
        $this->validator($request->all())->validate();

        // Crear el usuario
        event(new Registered($user = $this->create($request->all())));

        // Loguear al usuario recién creado
        Auth::login($user);

        // Redirigir al usuario después del login
        return redirect()->route('home');  // Redirige a la página de inicio
    }
}
