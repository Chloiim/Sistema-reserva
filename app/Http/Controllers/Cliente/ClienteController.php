<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function buscarTalleres()
    {
        return view('cliente/buscarTalleres');
    }

    public function perfilTaller()
    {
        return view('cliente/perfilTaller');
    }

    public function reservar()
    {
        return view('cliente/reservar');
    }

    public function misReservas()
    {
        return view('cliente/misReservas');
    }
}
