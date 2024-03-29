<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Ticket extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'user_id',
        'descripcion',
        'asunto',
        'file',
        'respuesta',
        'status',
        'fecha_cierre',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
