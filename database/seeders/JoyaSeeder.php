<?php

namespace Database\Seeders;

use App\Models\Joya;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Empresa;

class JoyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todas las empresas y usuarios de la tabla
        $empresas = Empresa::all();
        $usuarios = Usuario::all();
        
        // Crear joyas asignando aleatoriamente usuarios o empresas
        $usuarios->each(function($usuario) {
            Joya::factory()->count(5)->create([
                'usuario_id' => $usuario->id,
                'empresa_id' => null, // Añadir empresa_id con valor null
            ]);
        });

        $empresas->each(function($empresa) {
            Joya::factory()->count(5)->create([
                'usuario_id' => null, // Añadir usuario_id con valor null
                'empresa_id' => $empresa->id,
            ]);
        });
    }
}