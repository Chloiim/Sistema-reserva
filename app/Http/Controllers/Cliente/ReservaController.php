<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = Reserva::where('cliente_id', Auth::id())->with('servicio.taller')->get();
        return view('cliente.reservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $talleres = \App\Models\User::where('tipo_usuario', 'taller')->get();

        $taller_id = $request->query('taller_id');
        $servicios = collect();
        if ($taller_id) {
            $servicios = Servicio::where('taller_id', $taller_id)->get();
        }

        return view('cliente.reservas.create', [
            'talleres' => $talleres,
            'taller_id' => $taller_id,
            'servicios' => $servicios,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'servicio_id' => 'required|exists:servicios,id',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
        ]);

        $servicio = Servicio::findOrFail($request->servicio_id);

        Reserva::create([
            'cliente_id' => Auth::id(),
            'taller_id' => $servicio->taller_id,
            'servicio_id' => $servicio->id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'estado' => 'pendiente',
        ]);

        return redirect()->route('reservas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reserva = Reserva::findOrFail($id);
        if ($reserva->cliente_id !== Auth::id()) abort(403);
        $servicios = Servicio::all();
        return view('cliente.reservas.edit', compact('reserva', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {
        if ($reserva->cliente_id !== Auth::id()) abort(403);

        $request->validate([
            'servicio_id' => 'required|exists:servicios,id',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
        ]);

        $servicio = Servicio::findOrFail($request->servicio_id);

        $reserva->update([
            'servicio_id' => $request->servicio_id,
            'taller_id' => $servicio->taller_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
        ]);

        return redirect()->route('reservas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        if ($reserva->cliente_id !== Auth::id()) abort(403);
        $reserva->delete();
        return redirect()->route('reservas.index');
    }
}
