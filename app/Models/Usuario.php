<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


use Illuminate\Database\Eloquent\Casts\Attribute;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';

    // Relación de una empresa con muchas joyas
    public function joyas()
    {
        return $this->hasMany(Joya::class, 'usuario_id');
    }

}
