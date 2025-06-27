<?php

namespace App\Http\Controllers\Taller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TallerController extends Controller
{
    public function dashboard()
    {
        return view('taller/dashboardTaller');
    }

    public function configurarHorarios()
    {
        return view('taller/configurarHorarios');
    }

    public function servicios()
    {
        return view('taller/servicio');
    }

    public function reservas()
    {
        return view('taller/reservas');
    }
}
