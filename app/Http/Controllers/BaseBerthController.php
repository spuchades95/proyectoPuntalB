<?php

namespace App\Http\Controllers;

use App\Models\BaseBerth;
use Illuminate\Http\Request;

class BaseBerthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plazabase = BaseBerth::all();
        return view('plazasbase.index', compact('plazabase'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plazasbase.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'DatosEstancia' => 'nullable|string|max:255 ',
            'FechaEntrada' => 'required',
            'FinContrato' => 'required',
            'Amarre_id' => 'required',
        ]);
        $plazabase = new BaseBerth();
        $plazabase->DatosEstancia = $request->DatosEstancia;
        $plazabase->FechaEntrada = $request->FechaEntrada;
        $plazabase->FinContrato = $request->FinContrato;
        $plazabase->Amarre_id = $request->Amarre_id;
        $plazabase->save();
        return redirect()->route('plazasbase.index')
            ->with('success', 'Plaza base creada correctamente.');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $plazabase = BaseBerth::find($id);
        return view('plazasbase.show', compact('plazabase'));

       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plazabase = BaseBerth::find($id);
        return view('plazasbase.edit', compact('plazabase'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plazabase = BaseBerth::findOrFail($id);
        $plazabase->update($request->all());
        $plazabase->save();
        return redirect()->route('plazasbase.index')
            ->with('success', 'Plaza base actualizada correctamente.');
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plazabase = BaseBerth::find($id);
        $plazabase->delete();
        return redirect()->route('plazasbase.index')
            ->with('success', 'Plaza base eliminada correctamente.');
    }
}
