<?php

namespace App\Http\Controllers;

use App\Models\CivilGuardTransit;
use Illuminate\Http\Request;

class CivilGuardTransitController extends Controller
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
    public function show(CivilGuardTransit $civilGuardTransit)
    {
      
        $participationDate = $civilGuardTransit->created_at;

       
        $civilGuardDetails = $civilGuardTransit->guardiasciviles;
        $transitDetails = $civilGuardTransit->transitos;

        return view('civil_guard_transits.show', compact('civilGuardTransit', 'participationDate', 'civilGuardDetails', 'transitDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CivilGuardTransit $civilGuardTransit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CivilGuardTransit $civilGuardTransit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CivilGuardTransit $civilGuardTransit)
    {
        //
    }
}
