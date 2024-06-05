<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Empresa;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth.login.login');
    }

    public function login(Request $request)
    {
        $usuario = Usuario::where('login', $request->login)->first();
        $empresa = Empresa::where('login', $request->login)->first();

        if ($usuario) {
            $guard = 'web';
            $rol = $usuario->rol;
        } elseif ($empresa) {
            $guard = 'empresa';
            $rol = $empresa->rol;
        } else {
            throw ValidationException::withMessages(['login' => 'Las credenciales proporcionadas son incorrectas.']);
        }

        if (Auth::guard($guard)->attempt($request->only('login', 'password'))) {
            if ($rol == 'usuario') {
                return redirect()->intended('/');
            } elseif ($rol == "admin") {
                return redirect()->intended('/');
            } elseif ($rol == 'empresa') {
                return redirect()->intended('/');
            }
        } else {
            return redirect()->back()->withInput()->withErrors(['login' => 'Las credenciales proporcionadas son incorrectas.']);
        }
    }

    public function logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            return redirect('/login');
        } 
        
        if (Auth::guard('empresa')->check()) {
            Auth::guard('empresa')->logout();
            return redirect('/login');
        }
    }

    public function __construct()
    {
        $this->middleware('auth:web,empresa')->except(['loginForm', 'login']);
    }
}