<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Berth;
use Illuminate\Http\Request;

class BerthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Berth::all();
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
    public function show(Berth $berth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berth $berth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berth $berth)
    {
        //
    }
}
