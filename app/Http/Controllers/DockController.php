<?php

namespace App\Http\Controllers;

use App\Models\Dock;
use Illuminate\Http\Request;

class DockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plazas = Dock::all();
        return view('plazas.index', compact('plazas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plazas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required',
            'Ubicacion' => 'required',
            'Descripcion' => 'required',
            'Capacidad' => 'required',
            'FechaCreacion' => 'required',
            'Causa' => 'nullable|string|max:255',
            'Instalacion_id' => 'required',
        ]);
        $plaza = new Dock();
        $plaza->Nombre = $request->Nombre;
        $plaza->Ubicacion = $request->Ubicacion;
        $plaza->Descripcion = $request->Descripcion;
        $plaza->Capacidad = $request->Capacidad;
        $plaza->FechaCreacion = $request->FechaCreacion;
        $plaza->Causa = $request->Causa;
        $plaza->Instalacion_id = $request->Instalacion_id;
       

        $plaza->save();
        return redirect()->route('plazas.index')
            ->with('success', 'plaza creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dock $dock)
    {
        return view('plazas.show', compact('dock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dock $dock)
    {
        return view('plazas.edit', compact('dock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dock $dock)
    {
        $request->validate([
            'Nombre' => 'required',
            'Ubicacion' => 'required',
            'Descripcion' => 'required',
            'Capacidad' => 'required',
            'FechaCreacion' => 'required',
            'Causa' => 'nullable|string|max:255',
            'Instalacion_id' => 'required',
        ]);
        $plaza = new Dock();
        $plaza->Nombre = $request->Nombre;
        $plaza->Ubicacion = $request->Ubicacion;
        $plaza->Descripcion = $request->Descripcion;
        $plaza->Capacidad = $request->Capacidad;
        $plaza->FechaCreacion = $request->FechaCreacion;
        $plaza->Causa = $request->Causa;
        $plaza->Instalacion_id = $request->Instalacion_id;
       

        $plaza->save();
        return redirect()->route('plazas.index')
            ->with('success', 'plaza actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dock $dock)
    {
        $dock->delete();
        return redirect()->route('plazas.index')
            ->with('success', 'plaza eliminado correctamente.');
    }
}
