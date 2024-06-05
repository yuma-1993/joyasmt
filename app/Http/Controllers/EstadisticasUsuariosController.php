<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EstadisticasUsuariosController extends Controller
{
    public function index_usuario(Request $request)
    {
        $ID = $request->input('ID');
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
    
        $query = Usuario::query();
    
        if ($ID) {
            $query->where('id', $ID);
        }
        if ($nombre) {
            $query->where('nombre', 'like', '%' . $nombre . '%');
        }
        if ($apellido) {
            $query->where('apellido', 'like', '%' . $apellido . '%');
        }
    
        $usuarios = $query->get();
    
        return response()->json($usuarios, 200);
    }

    public function index_empresa(Request $request)
    {
        $ID = $request->input('ID');
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
    
        $query = Empresa::query();
    
        if ($ID) {
            $query->where('id', $ID);
        }
        if ($nombre) {
            $query->where('nombre', 'like', '%' . $nombre . '%');
        }
        if ($descripcion) {
            $query->where('descripcion', 'like', '%' . $descripcion . '%');
        }
    
        $empresas = $query->get();
    
        return response()->json($empresas, 200);
    }

    public function destroy_usuario($id) {   
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
    
        return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
    }

    public function destroy_empresa($id) {   
        $usuario = Empresa::findOrFail($id);
        $usuario->delete();
    
        return response()->json(['message' => 'Empresa eliminada correctamente'], 200);
    }

}
