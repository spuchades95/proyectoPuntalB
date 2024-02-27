<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $instalaciones = Facility::all();

    //     return view('instalaciones.index', compact('instalaciones'));
    // }

    public function index()
    {
        $instalaciones = Facility::with('pantalanes.plazas')->get();
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
          
        ]);

        $instalaciones = new Facility();
        $instalaciones->Ubicacion = $request->Ubicacion;
        $instalaciones->Dimensiones = $request->Dimensiones;
        $instalaciones->Descripcion = $request->Descripcion;
        $instalaciones->Estado = $request->Estado;
        $instalaciones->FechaCreacion = $request->FechaCreacion;
      

        $instalaciones->save();

        // Facility::create($request->all()); // Posible opción para crear el registro

        $idInstalacion = $instalaciones->id;
        // Session::put('id_instalacion', $idInstalacion);

        return redirect()->route('pantalanes.create', ['id_instalacion' => $idInstalacion])
            ->with('success', 'Facility created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $instalacion = Facility::find($id);
        return view('instalaciones.show', compact('instalacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $instalacion = Facility::find($id);
        return view('instalaciones.edit', compact('instalacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
   
        $instalacion = Facility::findOrFail($id);

        $instalacion->update($request->all());

        $instalacion->save();
        return redirect()->route('instalaciones.index')
            ->with('success', 'Facility updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instalacion = Facility::find($id);
        $instalacion->delete();

        return redirect()->route('instalaciones.index')
            ->with('success', 'Facility deleted successfully');
    }
}