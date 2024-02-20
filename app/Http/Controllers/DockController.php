<?php

namespace App\Http\Controllers;




use App\Models\Dock;
use App\Models\Facility;
use Illuminate\Http\Request;

class DockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pantalanes = Dock::all();
        return view('pantalanes.index', compact('pantalanes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $Instalacion_id = $request->input('facility');
        $InstalacionUbicacion = Facility::find($Instalacion_id)->Ubicacion;
        return view('pantalanes.create', [
            'Instalacion_id' => $Instalacion_id,
            'instalacion_ubicacion' => $InstalacionUbicacion
        ]);
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
        return redirect()->route('instalaciones.index')
            ->with('success', 'pantalán creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pantalan = Dock::find($id);
        $Instalacion_id = $pantalan->Instalacion_id;
        $InstalacionUbicacion = Dock::find($Instalacion_id)->Ubicacion;
        return view('pantalanes.show', compact('pantalan', 'InstalacionUbicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $pantalan = Dock::find($id);
       $Instalacion_id = $pantalan->Pantalan_id;
        $InstalacionUbicacion = Dock::find($Instalacion_id)->Ubicacion;
        return view('pantalanes.edit', compact('pantalan', 'InstalacionUbicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
  
   
        $pantalan = Dock::findOrFail($id);
        $pantalan->update($request->all());

        $pantalan->save();
        return redirect()->route('instalaciones.index')
            ->with('success', 'pantalán actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pantalan = Dock::find($id);
        $pantalan->delete();
        return redirect()->route('instalaciones.index')
            ->with('success', 'pantalán eliminado correctamente.');
    }
}
