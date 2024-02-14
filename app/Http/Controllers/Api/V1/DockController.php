<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Dock;
use Illuminate\Http\Request;

class DockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Dock::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dock = Dock::create($request->all());
        $dock->save();
        return response()->json($dock, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dock $dock)
    {
        $dock = Dock::find($dock);

        if ($dock == null) {
            return response()->json([
                'message' => 'No se encuentra el muelle',
                'code' => 404
            ], 404);
        }
        return response()->json([
            'data' => $dock,
            'code' => 200
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dock $dock)
    {
        try {
            // Verifica si el muelle existe
            $dock = Dock::find($dock);
            if ($dock == null) {
                return response()->json([
                    'message' => 'No se encuentra el muelle',
                    'code' => 404
                ], 404);
            }
            $dock->update($request->all());
            return response()->json([
                'data' => $dock,
                'code' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el muelle',
                'code' => 500
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dock = Dock::find($id);
        if ($dock == null) {
            return response()->json([
                'message' => 'No se encuentra el muelle',
                'code' => 404
            ], 404);
        }
        $dock->delete();
        return response()->json([
            'message' => 'Muelle eliminado',
            'code' => 200
        ], 200);
    }
}
