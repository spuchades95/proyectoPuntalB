<?php

namespace App\Http\Controllers;

use App\Models\Berth;
use Illuminate\Http\Request;

class BerthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amarre = Berth::all();
        return view('amarres.index', compact('amarre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('amarres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Estado' => 'required',
            'TipoPlaza' => 'required',
            'Anio' => 'required',
            'Causa' => 'nullable|string|max:255',
            'Pantalan_id' => 'required',
        ]);
        $amarre = new Berth();
        $amarre->Estado = $request->Estado;
        $amarre->TipoPlaza = $request->TipoPlaza;
        $amarre->Anio = $request->Anio;
        $amarre->Causa = $request->Causa;
        $amarre->Pantalan_id = $request->Pantalan_id;

        $amarre->save();
        return redirect()->route('amarres.index')
            ->with('success', 'Amarre creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berth $berth)
    {
        return view('amarres.show', compact('berth'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berth $berth)
    {
        return view('amarres.edit', compact('berth'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berth $berth)
    {
        $request->validate([
            'Estado' => 'required',
            'TipoPlaza' => 'required',
            'Anio' => 'required',
            'Causa' => 'nullable|string|max:255',
            'Pantalan_id' => 'required',
        ]);
        $berth->update($request->all());
        return redirect()->route('amarres.index')
            ->with('success', 'Amarre actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berth $berth)
    {
        $berth->delete();
        return redirect()->route('amarres.index')
            ->with('success', 'Amarre eliminado correctamente.');
    }
}
