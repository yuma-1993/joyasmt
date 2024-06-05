<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Empresa extends Authenticatable
{
    use HasFactory;

    protected $table = 'empresas';

    // Relación de una empresa con muchas joyas
    public function joyas()
    {
        return $this->hasMany(Joya::class, 'empresa_id');
    }
}
