<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JoyaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrarUsuarioController;
use App\Http\Controllers\RegistrarEmpresaController;
use App\Http\Controllers\EstadisticasUsuariosController;
use App\Http\Controllers\BuscadorJoyasController;
use App\Models\Joya;

// Vistas
Route::get('/', HomeController::class)->name('home');

Route::resource('joyas', JoyaController::class);

Route::view('nosotros', 'nosotros')->name('nosotros');

Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'loginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::view('registrar', 'auth.registrar.registrar')->name('registrar');
    Route::get('registrar-usuario', [RegistrarUsuarioController::class, 'mostrarFormulario'])->name('registrar-usuario');
    Route::post('registrar-usuario', [RegistrarUsuarioController::class, 'registrarUsuario']);
    Route::get('registrar-empresa', [RegistrarEmpresaController::class, 'mostrarFormulario'])->name('registrar-empresa');
    Route::post('registrar-empresa', [RegistrarEmpresaController::class, 'registrarEmpresa']);
});

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Usuario
Route::view('usuario', 'usuario.panel')->name('usuario.panel')->middleware('usuario');

//Empresa
Route::view('empresa', 'empresa.panel')->name('empresa.panel')->middleware('empresa');
Route::view('empresa_publicaciones', 'empresa.publicaciones')->name('empresa.publicaciones')->middleware('empresa');

// Admin
Route::view('admin', 'admin.panel')->name('admin.panel')->middleware('admin');
Route::view('administrar_usuarios', 'admin.administrar_usuarios')->name('admin.administrar_usuarios')->middleware('admin');
Route::view('administrar_empresas', 'admin.administrar_empresas')->name('admin.administrar_empresas')->middleware('admin');

//Joyas y estadisticas
Route::get('/consultar-estadisticas/usuarios', [EstadisticasUsuariosController::class, 'index_usuario'])->name('consultar.estadisticas.usuarios')->middleware('admin');
Route::get('/consultar-estadisticas/empresas', [EstadisticasUsuariosController::class, 'index_empresa'])->name('consultar.estadisticas.empresas')->middleware('admin');
Route::delete('/eliminar-usuario/{id}', [EstadisticasUsuariosController::class, 'destroy_usuario'])->name('eliminar.usuario')->middleware('admin');
Route::delete('/eliminar-empresa/
{id}', [EstadisticasUsuariosController::class, 'destroy_empresa'])->name('eliminar.empresa')->middleware('admin');

Route::get('/categorias', [JoyaController::class, 'obtenerCategorias']);
Route::get('/municipios', [JoyaController::class, 'obtenerMunicipios']);

Route::get('/buscar-joyas', [BuscadorJoyasController::class, 'index_joya'])->name('consultar.joyas');
Route::get('/aleatorias-joyas', [BuscadorJoyasController::class, 'obtenerJoyasAleatorias'])->name('consultar.joyas_aleatorias');
Route::get('/empresa_publicaciones/{empresa}', [BuscadorJoyasController::class, 'obtenerEmpresaJoyas'])
    ->name('consultar.empresa_publicaciones');
    Route::get('/usuario_publicaciones/{usuario}', [BuscadorJoyasController::class, 'obtenerUsuariosJoyas'])->name('consultar.usuario_publicaciones');
Route::view('usuario_publicaciones', 'usuario.publicaciones')->name('usuario.publicaciones')->middleware('usuario');