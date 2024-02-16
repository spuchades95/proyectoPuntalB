<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;

class CrewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tripulantes = Crew::all();
        return view('tripulantes.index', compact('tripulantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tripulacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NumeroDeDocumento' => 'required',
            'Nombre' => 'required',
            'Sexo' => 'required',
            'Nacionalidad' => 'required',
        
        ]);
        $tripulante = new Crew();

        $tripulante->NumeroDeDocumento = $request->NumeroDeDocumento;
        $tripulante->Nombre = $request->Nombre;
        $tripulante->Sexo = $request->Sexo;
        $tripulante->Nacionalidad = $request->Nacionalidad;


        $tripulante->save();
        return redirect()->route('tripulacion.index')
            ->with('success', 'Tripulante creado correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tripulante = Crew::find($id);
        return view('tripulantes.show', compact('tripulante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tripulante = Crew::find($id);
        return view('tripulantes.edit', compact('tripulante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tripulante = Crew::findOrFail($id);
        $tripulante->update($request->all());
        $tripulante->save();
        return redirect()->route('tripulacion.index')
            ->with('success', 'Tripulante actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tripulante = Crew::find($id);
        $tripulante->delete(); 
        return redirect()->route('tripulacion.index')
            ->with('success', 'Tripulante eliminado correctamente.');           
    }
}
