<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
        'taller_id',
        'nombre',
        'descripcion',
        'precio',
    ];
    public function taller()
    {
        return $this->belongsTo(User::class, 'taller_id');
    }
}
