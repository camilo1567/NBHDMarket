<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombre",
        "apellido",
        "email",
        "telefono"
    ];
}
