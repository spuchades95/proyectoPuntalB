<?php

namespace App\Http\Controllers;

use App\Models\TransitBoat;
use Illuminate\Http\Request;

class TransitBoatController extends Controller
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
    public function show(TransitBoat $transitBoat)
    {
        
        $transitDate = $transitBoat->created_at;

       
        $transitDetails = $transitBoat->transit;
        $boatDetails = $transitBoat->boat;

        return view('transit_boats.show', compact('transitBoat', 'transitDate', 'transitDetails', 'boatDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransitBoat $transitBoat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransitBoat $transitBoat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransitBoat $transitBoat)
    {
        //
    }
}
