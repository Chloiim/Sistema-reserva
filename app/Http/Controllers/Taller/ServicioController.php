<?php

namespace App\Http\Controllers\Taller;

use App\Models\Servicio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::where('taller_id', Auth::id())->get();
        return view('taller.servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('taller.servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric|min:0',
        ]);

        Servicio::create([
            'taller_id' => Auth::id(),
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
        ]);

        return redirect()->route('servicios.index');
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
    public function edit(Servicio $servicio)
    {
        if ($servicio->taller_id !== Auth::id()) {
            abort(403);
        }

        return view('taller.servicios.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio)
    {
        if ($servicio->taller_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric|min:0',
        ]);

        $servicio->update($request->only('nombre', 'descripcion', 'precio'));

        return redirect()->route('servicios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        if ($servicio->taller_id !== Auth::id()) {
            abort(403);
        }

        $servicio->delete();

        return redirect()->route('servicios.index');
    }
}
