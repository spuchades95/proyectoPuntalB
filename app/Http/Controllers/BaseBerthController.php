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
        // BaseBerth::create($request->all());

        // return redirect()->route('plazasbase.index')
        //     ->with('success', 'Plaza base creada correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(BaseBerth $baseBerth)
    {
        return view('plazasbase.show', compact('baseBerth'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BaseBerth $baseBerth)
    {
        return view('plazasbase.edit', compact('baseBerth'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BaseBerth $baseBerth)
    {
        $request->validate([
            'DatosEstancia' => 'nullable|string|max:255 ',
            'FechaEntrada' => 'required',
            'FinContrato' => 'required',
            'Amarre_id' => 'required',
        ]);
        $baseBerth->update($request->all());
        return redirect()->route('plazasbase.index')
            ->with('success', 'Plaza base actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BaseBerth $baseBerth)
    {
        $baseBerth->delete();
        return redirect()->route('plazasbase.index')
            ->with('success', 'Plaza base eliminada correctamente.');
    }
}
