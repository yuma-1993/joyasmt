<?php

namespace Database\Factories;

use App\Models\Joya;
use App\Models\Usuario;
use App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\Factory;

class JoyaFactory extends Factory
{
    protected $model = Joya::class;

    public function definition()
    {
        $isUsuario = $this->faker->boolean; // Aleatoriamente elige entre true (usuario) o false (empresa)

        if ($isUsuario) {
            $usuarioId = Usuario::inRandomOrder()->first()->id;
            $empresaId = null;
        } else {
            $usuarioId = null;
            $empresaId = Empresa::inRandomOrder()->first()->id;
        }

        $rutaImagen = 'public/assets/imagen/';

        // Obtener la lista de archivos de la carpeta de imágenes
        $imagenes = glob($rutaImagen . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);


        // Seleccionar aleatoriamente una de las imágenes
        $imagenAleatoria = $imagenes[array_rand($imagenes)];

        //Obtener el nombre d ela imagen
        $nombreImagenAleatoria = str_replace($rutaImagen, "", $imagenAleatoria);

        return [
            'nombre' => $this->faker->word(),
            'descripcion' => $this->faker->sentence(),
            'categoria' => $this->faker->randomElement(['Edificio', 'Ruta']),
            'imagen' => $nombreImagenAleatoria,
            'usuario_id' => $usuarioId,
            'empresa_id' => $empresaId,
        ];
    }
}