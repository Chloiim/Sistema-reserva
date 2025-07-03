<?php

namespace App\Http\Controllers\Taller;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TallerReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::where('taller_id', Auth::id())->with(['cliente', 'servicio'])->orderBy('fecha', 'desc')->get();

        return view('taller.reservas.index', compact('reservas'));
    }

    public function updateEstado(Request $request, Reserva $reserva)
    {
        if ($reserva->taller_id !== Auth::id()) abort(403);

        $request->validate([
            'estado' => 'required|in:pendiente,confirmado,cancelado',
        ]);

        $reserva->estado = $request->estado;
        $reserva->save();

        return redirect()->back();
    }
}
