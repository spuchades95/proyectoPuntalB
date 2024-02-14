<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Concessionaire;
use Illuminate\Http\Request;

class ConcessionaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Concessionaire::all();
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
    public function show(Concessionaire $concessionaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Concessionaire $concessionaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Concessionaire $concessionaire)
    {
        //
    }
}
