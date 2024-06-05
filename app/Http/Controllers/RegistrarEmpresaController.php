<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Empresa;
use Illuminate\Support\Facades\Hash;

class RegistrarEmpresaController extends Controller
{
    public function mostrarFormulario()
    {
        return view('auth.registrar.registrar-empresa');
    }

    public function registrarEmpresa(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'login' => 'required|unique:empresas',
            'password' => 'required|confirmed|min:1',
            'email' => 'required|email|unique:usuarios',
            'nombre' => 'required',
            'descripcion' => 'required',
            'municipio' => 'required',
            'codigo_postal' => 'required',
            'direccion' => 'required',
            'tipo' => 'required|not_in:-------',
        ]);

        // Crear un nuevo usuario
        $empresa = new Empresa();
        $empresa->login = $request->login;
        $empresa->password = Hash::make($request->password);
        $empresa->email = $request->email;
        $empresa->nombre = $request->nombre;
        $empresa->descripcion = $request->descripcion;
        $empresa->web = $request->web;
        $empresa->tipo = $request->tipo;
        $empresa->direccion = $request->direccion;
        $empresa->municipio = $request->municipio;
        $empresa->codigo_postal = $request->codigo_postal;
        $empresa->save();

        // Autenticar al nuevo usuario
        Auth::guard('empresa')->login($empresa);

        // Redirigir a la página de inicio o a donde sea apropiado
        return redirect()->intended(route('joyas.index'));
    }
}
