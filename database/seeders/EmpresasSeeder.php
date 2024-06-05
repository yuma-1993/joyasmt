<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Importa la clase Hash
use App\Models\Empresa;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empresa = new Empresa();
        $empresa->login = 'paulino';
        $empresa->password = Hash::make('1'); // Utiliza Hash::make() para hashear la contraseña
        $empresa->email = "paulino@paulino.com";
        $empresa->rol = "empresa";
        $empresa->nombre = 'Bar paulino';
        $empresa->save();
    }
}
