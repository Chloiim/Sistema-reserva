<?php

namespace App\Http\Controllers\Taller;

use App\Models\Taller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TallerCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $talleres = Taller:: all ();
        return view('taller.talleres.index', compact('talleres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('taller.talleres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
        ]);

        Taller::create($request->all());

        return redirect()->route('crud-talleres.index');
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
    public function edit(Taller $crud_tallere)
    {
        return view('taller.talleres.edit', ['taller' => $crud_tallere]);
    }
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Taller $crud_tallere)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
        ]);

        $crud_tallere->update($request->all());

        return redirect()->route('crud-talleres.index')->with('success', 'Taller actualizado correctamente.');
    }
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Taller $crud_tallere)
    {
        $crud_tallere->delete();
        return redirect()->route('crud-talleres.index')->with('success', 'Taller eliminado correctamente.');
    }
}
