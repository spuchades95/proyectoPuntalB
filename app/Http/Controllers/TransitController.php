<?php

namespace App\Http\Controllers;

use App\Models\Transit;
use Illuminate\Http\Request;

class TransitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transitos = Transit::all();
        return view('transitos.index', compact('transitos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transitos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Proposito' => 'nullable|string|max:255',
            'FechaEntrada' => 'required',
            'Guardamuelles_id' => 'required',
            'FechaSalida' => 'required',
            'Autorizacion' => 'required',
            'Amarre_id' => 'required',
            'Administrativo_id' => 'required',
        ]);

        $transito = new Transit();
        $transito->Proposito = $request->Proposito;
        $transito->FechaEntrada = $request->FechaEntrada;
        $transito->Guardamuelles_id = $request->Guardamuelles_id;
        $transito->FechaSalida = $request->FechaSalida;
        $transito->Autorizacion = $request->Autorizacion;
        $transito->Amarre_id = $request->Amarre_id;
        $transito->Administrativo_id = $request->Administrativo_id;

        $transito->save();

        return redirect()->route('transitos.index')
            ->with('success', 'Transit created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transit $transit)
    {
        return view('transitos.show', compact('transit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transit $transit)
    {
        return view('transitos.edit', compact('transit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transit $transit)
    {
        $request->validate([
            'Proposito' => 'nullable|string|max:255',
            'FechaEntrada' => 'required',
            'Guardamuelles_id' => 'required',
            'FechaSalida' => 'required',
            'Autorizacion' => 'required',
            'Amarre_id' => 'required',
            'Administrativo_id' => 'required',
        ]);

        $transit->update($request->all());

        return redirect()->route('transitos.index')
            ->with('success', 'Transit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transit $transit)
    {
        $transit->delete();

        return redirect()->route('transitos.index')
            ->with('success', 'Transit deleted successfully');
    }
}
