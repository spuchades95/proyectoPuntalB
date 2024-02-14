<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\DockWorker;
use Illuminate\Http\Request;

class DockWorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DockWorker::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dockWorker = DockWorker::create($request->all());
        $dockWorker->save();
        return response()->json($dockWorker, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(DockWorker $dockWorker)
    {
        $dockWorker = DockWorker::find($dockWorker);

        if ($dockWorker == null) {
            return response()->json([
                'message' => 'No se encuentra el trabajador de muelle',
                'code' => 404
            ], 404);
        }
        return response()->json([
            'data' => $dockWorker,
            'code' => 200
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DockWorker $dockWorker)
    {
        try {
            // Verifica si el trabajador de muelle existe
            $dockWorker = DockWorker::find($dockWorker);
            if ($dockWorker == null) {
                return response()->json([
                    'message' => 'No se encuentra el trabajador de muelle',
                    'code' => 404
                ], 404);
            }
            $dockWorker->update($request->all());
            return response()->json([
                'data' => $dockWorker,
                'code' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el trabajador de muelle',
                'code' => 500
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dockWorker = DockWorker::find($id);
        if ($dockWorker == null) {
            return response()->json([
                'message' => 'No se encuentra el trabajador de muelle',
                'code' => 404
            ], 404);
        }
        $dockWorker->delete();
        return response()->json([
            'message' => 'Trabajador de muelle eliminado',
            'code' => 200
        ], 200);
    }
}
