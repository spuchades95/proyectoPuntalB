<?php

namespace App\Http\Controllers;

use App\Models\AdministrativeBerths;
use Illuminate\Http\Request;

class AdministrativeBerthsController extends Controller
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
    public function show(AdministrativeBerths $administrativeBerths)
    {

    
        $assignmentDate = $administrativeBerths->created_at;

        
        $berthDetails = $administrativeBerths->amarres;
        $administrativeDetails = $administrativeBerths->administrativos;

        
        return view('administrative_berths.show', compact('administrativeBerths', 'assignmentDate', 'berthDetails', 'administrativeDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdministrativeBerths $administrativeBerths)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdministrativeBerths $administrativeBerths)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdministrativeBerths $administrativeBerths)
    {
        //
    }
}
