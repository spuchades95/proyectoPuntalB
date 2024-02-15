<?php

namespace App\Http\Controllers;

use App\Models\ConcessionaireFacility;
use Illuminate\Http\Request;

class ConcessionaireFacilityController extends Controller
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
    public function show(ConcessionaireFacility $concessionaireFacility)
    {
        
        $assignmentDate = $concessionaireFacility->created_at;

       
        $facilityDetails = $concessionaireFacility->facility;
        $concessionaireDetails = $concessionaireFacility->concessionaire;

      
        return view('concessionaire_facilities.show', compact('concessionaireFacility', 'assignmentDate', 'facilityDetails', 'concessionaireDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ConcessionaireFacility $concessionaireFacility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ConcessionaireFacility $concessionaireFacility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ConcessionaireFacility $concessionaireFacility)
    {
        //
    }
}
