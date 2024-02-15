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
        $incidentes = Incident::all();

        return view('incidentes.index', compact('incidentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('incidentes.create');
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

        $incidentes = new Incident();
        $incidentes->Titulo = $request->Titulo;
        $incidentes->Imagen = $request->Imagen;
        $incidentes->Leido = $request->Leido;
        $incidentes->Guardamuelle_id = $request->Guardamuelle_id;
        $incidentes->Descripcion = $request->Descripcion;
        $incidentes->Administrativo_id = $request->Administrativo_id;


        $incidentes->save();

        return redirect()->route('incidentes.index')
            ->with('success', 'Incident created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Incident $incident)
    {
        return view('incidentes.show', compact('incident'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incident $incident)
    {
        return view('incidentes.edit', compact('incident'));
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

        return redirect()->route('incidentes.index')
            ->with('success', 'Incident updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incident $incident)
    {
        $incident->delete();

        return redirect()->route('incidentes.index')
            ->with('success', 'Incident deleted successfully');
    }
}
