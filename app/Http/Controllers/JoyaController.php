<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joya;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class JoyaController extends Controller
{
    public function index() {
        $joyas = Joya::paginate(5);

        return view('joyas.index', compact('joyas'));
    }

    public function create() {
        return view('joyas.create');
    }

    public function store(Request $request) {
        $nombreImagen = '';

        $request->validate(
            [
                'nombre' => 'required|min:3',
                'descripcion' => 'required',
                'categoria' => 'required'
            ]);

        
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $imagen = $request->file('imagen');
            $rutaGuardarImagen = 'assets/imagen/';
            $nombreImagen = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
    
            // Verificar si el archivo se ha subido correctamente
            if ($imagen->move($rutaGuardarImagen, $nombreImagen)) {
                // Verificar si la imagen realmente existe en la ruta especificada
                if (!File::exists(public_path($rutaGuardarImagen . $nombreImagen))) {
                    return back()->with('error', 'Error al subir la imagen.');
                }
            } else {
                return back()->with('error', 'Error al subir la imagen.');
            }
        }

        // Verificar si el usuario está autenticado como empresa
        if (Auth::guard('empresa')->check()) {
            $usuarioId = null;
            $empresaId = Auth::guard('empresa')->id();
        } else {
            $usuarioId = Auth::guard('web')->id();;
            $empresaId = null;
        }
        

        // Crear la joya con los datos del formulario y los IDs del usuario y empresa
        $joya = Joya::create(array_merge($request->all(), [
            'usuario_id' => $usuarioId,
            'empresa_id' => $empresaId,
            'imagen' => $nombreImagen,
        ]));

        return redirect()->route('joyas.show', $joya->id);
    }

    public function show(Joya $joya) {
        return view('joyas.show', compact('joya'));
    }

    public function edit(Joya $joya) {
        $usuario = Auth::guard('web')->user();
        $empresa = Auth::guard('empresa')->user();
    
        // Verificar si el usuario o empresa es el propietario de la joya
        if ($usuario && $usuario->id == $joya->usuario_id) {
            return view('joyas.edit', compact('joya'));
        } elseif ($empresa && $empresa->id == $joya->empresa_id) {
            return view('joyas.edit', compact('joya'));
        } else {
            return redirect()->route('home')->with('error', 'No tienes permiso para editar esta joya.');
        }
    }

    public function update(Request $request, Joya $joya) {
        $request->validate([
            'nombre' => 'required|min:3',
            'descripcion' => 'required',
            'categoria' => 'required|not_in:-------',
        ]);
    
        // Actualizar los datos de la joya excepto la imagen
        $joya->update($request->except('imagen'));
    
        // Manejar la lógica de subir la imagen si se proporciona
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $imagen = $request->file('imagen');
            $nombreImagen = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            
            // Ruta donde se guardará la imagen en el directorio público
            $rutaGuardarImagen = 'assets/imagen/';
    
            // Guardar la nueva imagen en el directorio público
            if ($imagen->move(public_path($rutaGuardarImagen), $nombreImagen)) {
                // Actualizar la ruta de la imagen en la base de datos
                $joya->imagen = $nombreImagen;
                $joya->save();
            } else {
                return back()->with('error', 'Error al subir la imagen.');
            }
        }
    
        return redirect()->route('joyas.show', $joya->id);
    }

    public function destroy(Joya $joya) {
        $usuario = Auth::guard('web')->user();
        $empresa = Auth::guard('empresa')->user();
    
        // Verificar si el usuario o empresa es el propietario de la joya
        if (($usuario && $usuario->id == $joya->usuario_id) || ($usuario && $usuario->rol === 'admin')) {
            $joya->delete();
            return redirect()->route('home');
        } elseif (($empresa && $empresa->id == $joya->empresa_id) || ($usuario && $usuario->rol === 'admin')){
            $joya->delete();
            return redirect()->route('home');
        } else {
            return redirect()->route('home')->with('error', 'No tienes permiso para eliminar esta joya.');
        }
    }

    public function construct()
    {
        $this->middleware('auth',
        ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    //Obtener categorias
    public function obtenerCategorias(Request $request)
    {
        $categorias = Joya::distinct()->pluck('categoria')->toArray();
        return response()->json($categorias);
    }

    //Obtener municipios
    public function obtenerMunicipios(Request $request)
    {
        $municipios = Joya::distinct()->pluck('municipio')->toArray();
        return response()->json($municipios);
    }
}
