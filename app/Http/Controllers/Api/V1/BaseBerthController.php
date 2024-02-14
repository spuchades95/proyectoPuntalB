<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\BaseBerth;
use Illuminate\Http\Request;

class BaseBerthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BaseBerth::all();
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
    public function show(BaseBerth $baseBerth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BaseBerth $baseBerth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BaseBerth $baseBerth)
    {
        //
    }
}
