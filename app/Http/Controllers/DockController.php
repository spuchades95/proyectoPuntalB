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
        $muelle = Dock::all();
        return view('muelles.index', compact('muelle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('muelles.create');
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
        $muelle = new Dock();
        $muelle->Nombre = $request->Nombre;
        $muelle->Ubicacion = $request->Ubicacion;
        $muelle->Descripcion = $request->Descripcion;
        $muelle->Capacidad = $request->Capacidad;
        $muelle->FechaCreacion = $request->FechaCreacion;
        $muelle->Causa = $request->Causa;
        $muelle->Instalacion_id = $request->Instalacion_id;
       

        $muelle->save();
        return redirect()->route('muelles.index')
            ->with('success', 'Muelle creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dock $dock)
    {
        return view('muelles.show', compact('dock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dock $dock)
    {
        return view('muelles.edit', compact('dock'));
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
        $muelle = new Dock();
        $muelle->Nombre = $request->Nombre;
        $muelle->Ubicacion = $request->Ubicacion;
        $muelle->Descripcion = $request->Descripcion;
        $muelle->Capacidad = $request->Capacidad;
        $muelle->FechaCreacion = $request->FechaCreacion;
        $muelle->Causa = $request->Causa;
        $muelle->Instalacion_id = $request->Instalacion_id;
       

        $muelle->save();
        return redirect()->route('muelles.index')
            ->with('success', 'Muelle actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dock $dock)
    {
        $dock->delete();
        return redirect()->route('muelles.index')
            ->with('success', 'Muelle eliminado correctamente.');
    }
}
