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
    public function show(string $id)
    {
        $incidencia = Incident::find($id);
        return view('incidencias.show', compact('incidencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $incidencia = Incident::find($id);
        return view('incidencias.edit', compact('incidencia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        $incidencia = Incident::findorFail($id);

        $incidencia->update($request->all());
        $incidencia->save();
        return redirect()->route('incidencias.index')
            ->with('success', 'Incident updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $incidencia = Incident::find($id);
        $incidencia->delete();

        return redirect()->route('incidencias.index')
            ->with('success', 'Incident deleted successfully');
    }
}
