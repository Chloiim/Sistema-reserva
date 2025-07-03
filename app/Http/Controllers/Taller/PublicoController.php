<?php

namespace App\Http\Controllers\Taller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PublicoController extends Controller
{
    public function perfil($id)
    {
        $taller = User::with('servicios')->where('tipo_usuario', 'taller')->findOrFail($id);

        return view('taller.publico.perfil', compact('taller'));
    }
}
