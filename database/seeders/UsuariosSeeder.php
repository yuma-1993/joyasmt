<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Importa la clase Hash
use App\Models\Usuario;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = new Usuario();
        $usuario->login = 'johaniel';
        $usuario->password = Hash::make('1'); // Utiliza Hash::make() para hashear la contraseña
        $usuario->email = "asdasda@pepe.com";
        $usuario->rol = "usuario";
        $usuario->nombre = 'Johaniel'; // Agregar el nombre
        $usuario->apellido = 'Apellido'; // Agregar el apellido
        $usuario->municipio = 'Municipio'; // Agregar el municipio
        $usuario->save();
    }
}
