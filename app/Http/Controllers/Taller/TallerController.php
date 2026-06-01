<?php

namespace App\Http\Controllers\Taller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserva;
use App\Models\Servicio;
use App\Models\User;

class TallerController extends Controller
{
    public function dashboard()
    {
        $tallerId = Auth::id();
        $reservasCount = Reserva::where('taller_id', $tallerId)->count();
        $serviciosCount = Servicio::where('taller_id', $tallerId)->count();
        $proximasReservas = Reserva::where('taller_id', $tallerId)
            ->orderBy('fecha')
            ->orderBy('hora')
            ->limit(5)
            ->get();

        return view('taller.dashboardTaller', compact('reservasCount', 'serviciosCount', 'proximasReservas'));
    }

    public function perfil()
    {
        $taller = Auth::user();

        return view('taller.perfil', compact('taller'));
    }

    public function editarPerfil()
    {
        $taller = Auth::user();

        return view('taller.perfil-editar', compact('taller'));
    }

    public function actualizarPerfil(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ubicacion' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'descripcion' => 'nullable|string',
        ]);

        /** @var User $taller */
        $taller = Auth::user();
        $taller->update($request->only('name', 'ubicacion', 'direccion', 'telefono', 'descripcion'));

        return redirect()->route('taller.mi-perfil')->with('success', 'Perfil actualizado correctamente.');
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
