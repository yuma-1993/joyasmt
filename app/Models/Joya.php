<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joya extends Model
{
    use HasFactory;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }
    /*EXPLICACIÓN TEÓRICA*/
    /*En la variable fillable almacenariamos en un array todos los campos que se estarian guardando
    del objeto joya. Sin embargo a veces es un número de elementos muy alto y por tanto ensuciaria el código*/
    /*Entonces, declararemos la variable guarded, para asignar los campos que no queremos que se guarden*/
    //protected $fillable = ['nombre', 'descripcion', 'categoria'];

    protected $guarded = [''];
}
