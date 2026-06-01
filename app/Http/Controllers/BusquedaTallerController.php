<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusquedaTallerController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\User::where('tipo_usuario', 'taller');

        if ($request->filled('busqueda')) {
            $busqueda = $request->busqueda;

            $query->where(function ($q) use ($busqueda) {
                $q->where('name', 'like', '%' . $busqueda . '%')
                  ->orWhere('ubicacion', 'like', '%' . $busqueda . '%')
                  ->orWhereHas('servicios', function ($servicios) use ($busqueda) {
                      $servicios->where('nombre', 'like', '%' . $busqueda . '%');
                  });
            });
        }

        $talleres = $query->with('servicios')->get();

        return view('busqueda.buscarTalleres', compact('talleres'));
    }
}
