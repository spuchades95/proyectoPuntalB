<?php

namespace App\Http\Controllers;

use App\Models\TransitCrew;
use Illuminate\Http\Request;

class TransitCrewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(TransitCrew $transitCrew)
    {
     
        $crewName = $transitCrew->crew->Nombre;
        $crewNationality = $transitCrew->crew->Nacionalidad;

       
        $transitDetails = $transitCrew->transit;

        
        return view('transit_crews.show', compact('transitCrew', 'crewName', 'crewNationality', 'transitDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransitCrew $transitCrew)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransitCrew $transitCrew)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransitCrew $transitCrew)
    {
        //
    }
}
