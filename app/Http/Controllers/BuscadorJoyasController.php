<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joya;
use App\Models\Usuario;
use App\Models\Empresa;

class BuscadorJoyasController extends Controller
{
    public function index_joya(Request $request)
    {
        $nombre = $request->input('nombre');
        $categoria = $request->input('categoria');
        $municipio = $request->input('municipio');
        
    
        $query = Joya::query();
    
        if ($nombre) {
            $query->where('nombre', 'like', '%' . $nombre . '%');
        }
        if ($categoria) {
            $query->where('categoria', $categoria);
        }
        if ($municipio) {
            $query->where('municipio', $municipio);
        }
    
        $joyas = $query->get();
    
        return response()->json($joyas, 200);
    }

    public function obtenerJoyasAleatorias()
    {
        $joyasAleatorias = Joya::inRandomOrder()->limit(5)->get();
    
        return response()->json($joyasAleatorias, 200);
    }

    public function obtenerEmpresaJoyas(Empresa $empresa)
    {
        $joyas = Joya::where('empresa_id', $empresa->id)
                      ->whereNull('usuario_id')
                      ->get();
        return response()->json($joyas, 200);
    }

    public function obtenerUsuariosJoyas(Usuario $usuario)
    {
        $joyas = Joya::where('usuario_id', $usuario->id)
                      ->whereNull('empresa_id')
                      ->get();
        return response()->json($joyas, 200);
    }
}
