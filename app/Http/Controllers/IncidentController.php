<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidencias = Incident::all();

        return view('incidencias.index', compact('incidencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('incidencias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Titulo' => 'required',
            'Imagen' => 'nullable|image',
            'Leido' => 'required',
            'Guardamuelle_id' => 'required',
            'Descripcion' => 'required',
            'Administrativo_id' => 'required',
          
        ]);

        $incidencia = new Incident();
        $incidencia->Titulo = $request->Titulo;
        $incidencia->Imagen = $request->Imagen;
        $incidencia->Leido = $request->Leido;
        $incidencia->Guardamuelle_id = $request->Guardamuelle_id;
        $incidencia->Descripcion = $request->Descripcion;
        $incidencia->Administrativo_id = $request->Administrativo_id;


        $incidencia->save();

        return redirect()->route('incidencias.index')
            ->with('success', 'Incident created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Incident $incident)
    {
        return view('incidencias.show', compact('incident'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incident $incident)
    {
        return view('incidencias.edit', compact('incident'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incident $incident)
    {
        $request->validate([
            'Titulo' => 'required',
            'Imagen' => 'nullable|image',
            'Leido' => 'required',
            'Guardamuelle_id' => 'required',
            'Descripcion' => 'required',
            'Administrativo_id' => 'required',
        ]);

        $incident->update($request->all());

        return redirect()->route('incidencias.index')
            ->with('success', 'Incident updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incident $incident)
    {
        $incident->delete();

        return redirect()->route('incidencias.index')
            ->with('success', 'Incident deleted successfully');
    }
}
