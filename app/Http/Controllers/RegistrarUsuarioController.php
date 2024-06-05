<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class RegistrarUsuarioController extends Controller
{
    public function mostrarFormulario()
    {
        return view('auth.registrar.registrar-usuario');
    }

    public function registrarUsuario(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'login' => 'required|unique:usuarios',
            'password' => 'required|confirmed|min:1',
            'email' => 'required|email|unique:usuarios',
            'nombre' => 'required',
            'apellido' => 'required',
            'municipio' => 'required',
            'genero' => 'required|not_in:-------',
        ]);

        // Crear un nuevo usuario
        $usuario = new Usuario();
        $usuario->login = $request->login;
        $usuario->password = Hash::make($request->password);
        $usuario->email = $request->email;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->municipio = $request->municipio;
        $usuario->genero = $request->genero;
        $usuario->telefono = $request->telefono;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->direccion = $request->direccion;
        $usuario->codigo_postal = $request->codigo_postal;
        $usuario->save();

        // Autenticar al nuevo usuario
        Auth::guard('web')->login($usuario);

        // Redirigir a la página de inicio o a donde sea apropiado
        return redirect()->intended(route('joyas.index'));
    }
}
