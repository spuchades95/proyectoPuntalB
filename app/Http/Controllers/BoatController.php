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
        $barcos = Boat::all();
        return view('barcos.index', compact('barcos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barcos.create');
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
        $barco = new Boat();
        $barco->Matricula = $request->Matricula;
        $barco->Manga = $request->Manga;
        $barco->Eslora = $request->Eslora;
        $barco->Origen = $request->Origen;
        $barco->Titular = $request->Titular;
        if ($request->hasFile('Imagen')) {
            $barco->Imagen = $request->file('Imagen')->store('public');
        }
        $barco->Numero_Registro = $request->Numero_Registro;
        $barco->Datos_tecnicos = $request->Datos_tecnicos;
        $barco->Modelo = $request->Modelo;
        $barco->Nombre = $request->Nombre;
        $barco->Causa = $request->Causa;
        $barco->Tipo = $request->Tipo;


        $barco->save();
        return redirect()->route('barcos.index')
            ->with('success', 'Barco creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Boat $boat)
    {
        return view('barcos.show', compact('boat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boat $boat)
    {
        return view('barcos.edit', compact('boat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Boat $boat)
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
        $boat->update($request->all());
        return redirect()->route('barcos.index')
            ->with('success', 'Barco actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boat $boat)
    {
        $boat->delete();
        return redirect()->route('barcos.index')
            ->with('success', 'Barco eliminado correctamente.');
    }
}
