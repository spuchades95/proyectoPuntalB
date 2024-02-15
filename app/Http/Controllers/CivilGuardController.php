<?php

namespace App\Http\Controllers;

use App\Models\CivilGuard;
use Illuminate\Http\Request;

class CivilGuardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guardiasCiviles = CivilGuard::with('usuario')->get();

        return view('guardiasciviles.index', compact('guardiasCiviles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CivilGuard $civilGuard)
    {
        $civilGuard->load('usuario');

        return view('guardiasciviles.show', compact('civilGuard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CivilGuard $civilGuard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CivilGuard $civilGuard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CivilGuard $civilGuard)
    {
        //
    }
}
