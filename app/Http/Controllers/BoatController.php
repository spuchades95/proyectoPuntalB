<?php

namespace App\Http\Controllers;

use App\Models\Boat;
use Illuminate\Http\Request;

class BoatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $embarcaciones = Boat::all();
        return view('embarcaciones.index', compact('embarcaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('embarcaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Matricula' => 'required',
            'Manga' => 'required',
            'Eslora' => 'required',
            'Origen' => 'required',
            'Titular' => 'required',
            'Imagen' => 'nullable|image',
            'Numero_Registro' => 'required',
            'Datos_tecnicos' => 'required',
            'Modelo' => 'required',
            'Nombre' => 'required',
            'Causa' => 'nullable|string|max:255',
            'Tipo' => 'required',
        ]);
        $embarcacion = new Boat();
        $embarcacion->Matricula = $request->Matricula;
        $embarcacion->Manga = $request->Manga;
        $embarcacion->Eslora = $request->Eslora;
        $embarcacion->Origen = $request->Origen;
        $embarcacion->Titular = $request->Titular;
        if ($request->hasFile('Imagen')) {
            $embarcacion->Imagen = $request->file('Imagen')->store('public');
        }
        $embarcacion->Numero_Registro = $request->Numero_Registro;
        $embarcacion->Datos_tecnicos = $request->Datos_tecnicos;
        $embarcacion->Modelo = $request->Modelo;
        $embarcacion->Nombre = $request->Nombre;
        $embarcacion->Causa = $request->Causa;
        $embarcacion->Tipo = $request->Tipo;


        $embarcacion->save();
        return redirect()->route('embarcaciones.index')
            ->with('success', 'Barco creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    
    {
        $embarcacion = Boat::find($id);
        return view('embarcaciones.show', compact('embarcacion'));
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $embarcacion = Boat::find($id);
        return view('embarcaciones.edit', compact('embarcacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $embarcacion = Boat::findOrFail($id);
        $embarcacion->update($request->all());
        if ($request->hasFile('Imagen')) {
            $embarcacion->Imagen = $request->file('Imagen')->store('public');
        }
        $embarcacion->save();
        return redirect()->route('embarcaciones.index')
            ->with('success', 'Barco actualizado correctamente.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $embarcacion = Boat::find($id);
        $embarcacion->delete();
        return redirect()->route('embarcaciones.index')
            ->with('success', 'Barco eliminado correctamente.');

    }
}
