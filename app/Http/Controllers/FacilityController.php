<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instalaciones = Facility::all();

        return view('instalaciones.index', compact('instalaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instalaciones.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Ubicacion' => 'required',
            'Dimensiones' => 'required',
            'Descripcion' => 'required',
            'Estado' => 'required',
            'FechaCreacion' => 'required',
            'Causa' => 'nullable|string|max:255',
        ]);

        $instalaciones = new Facility();
        $instalaciones->Ubicacion = $request->Ubicacion;
        $instalaciones->Dimensiones = $request->Dimensiones;
        $instalaciones->Descripcion = $request->Descripcion;
        $instalaciones->Estado = $request->Estado;
        $instalaciones->FechaCreacion = $request->FechaCreacion;
        $instalaciones->Causa = $request->Causa;

        $instalaciones->save();

        // Facility::create($request->all()); // Posible opción para crear el registro

        return redirect()->route('instalaciones.index')
            ->with('success', 'Facility created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility)
    {
        return view('instalaciones.show', compact('facility'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $facility)
    {
        return view('instalaciones.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'Ubicacion' => 'required',
            'Dimensiones' => 'required',
            'Descripcion' => 'required',
            'Estado' => 'required',
            'FechaCreacion' => 'required',
            'Causa' => 'nullable|string|max:255',
        ]);

        $facility->update($request->all());

        return redirect()->route('instalaciones.index')
            ->with('success', 'Facility updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        $facility->delete();

        return redirect()->route('instalaciones.index')
            ->with('success', 'Facility deleted successfully');
    }
}
