<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nbhdmarket extends Model
{
    use HasFactory;

    protected $table = 'nbhdmarket';

    protected $fillable = [
        'telefono',
        'correo',
        'direccion',
        'twitter',
        'facebook',
        'instagram',
        'whatsapp'
    ];
}
