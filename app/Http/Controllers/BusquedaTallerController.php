<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusquedaTallerController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\User::where('tipo_usuario', 'taller');

        if ($request->filled('ubicacion')) {
            $query->where('ubicacion', 'like', '%' . $request->ubicacion . '%');
        }

        if ($request->filled('servicio')) {
            $query->whereHas('servicios', function ($q) use ($request) {
                $q->where('nombre', 'like', '%' . $request->servicio . '%');
            });
        }

        $talleres = $query->with('servicios')->get();

        return view('busqueda.index', compact('talleres'));
    }
}
