<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'foto_perfil',
        'foto_portada',
        'nombre',
        'contacto',
        'direccion',
        'descripcion',
        'instagram',
        'facebook',
        'twitter',
        'whatsapp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
