<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'cliente_id',
        'taller_id',
        'servicio_id',
        'fecha',
        'hora',
        'estado',
    ];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function taller()
    {
        return $this->belongsTo(User::class, 'taller_id');
    }

    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }
}
