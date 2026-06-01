<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ClienteController extends Controller
{
    public function buscarTalleres()
    {
        $talleres = User::where('tipo_usuario', 'taller')->with('servicios')->get();

        return view('cliente.buscarTalleres', compact('talleres'));
    }

    public function perfilTaller($id)
    {
        $taller = User::with('servicios')
            ->where('tipo_usuario', 'taller')
            ->where('id', $id)
            ->firstOrFail();
        return view('cliente.perfilTaller', compact('taller'));
    }

    public function reservar()
    {
        return redirect()->route('reservas.create');
    }

    public function misReservas()
    {
        return view('cliente/misReservas');
    }
}
