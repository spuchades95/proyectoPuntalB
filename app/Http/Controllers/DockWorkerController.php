<?php

namespace App\Http\Controllers;

use App\Models\DockWorker;
use Illuminate\Http\Request;

class DockWorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guardamuelles = DockWorker::with('usuario')->get();

        return view('guardamuelles.index', compact('guardamuelles'));
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
    public function show(DockWorker $dockWorker)
    {
        $dockWorker->load('usuario');

        return view('guardamuelles.show', compact('dockWorker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DockWorker $dockWorker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DockWorker $dockWorker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DockWorker $dockWorker)
    {
        //
    }
}
