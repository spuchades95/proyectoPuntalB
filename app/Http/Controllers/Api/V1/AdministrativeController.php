<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Administrative;
use Illuminate\Http\Request;

class AdministrativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Administrative::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $administrative = Administrative::create($request->all());
        $administrative->save();
        return response()->json($administrative, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrative $administrative)
    {
        $administrative = Administrative::find($administrative);

        if ($administrative == null) {
            return response()->json([
                'message' => 'No se encuentra el administrativo',
                'code' => 404
            ], 404);
        }
        return response()->json([
            'data' => $administrative,
            'code' => 200
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrative $administrative)
    {
        try {
            // Verifica si el administrativo existe
            $administrative = Administrative::find($administrative);
            if ($administrative == null) {
                return response()->json([
                    'message' => 'No se encuentra el administrativo',
                    'code' => 404
                ], 404);
            }
            // Actualiza el administrativo
            $administrative->update($request->all());
            return response()->json([
                'data' => $administrative,
                'code' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el administrativo',
                'code' => 500
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $administrative = Administrative::find($id);
            if ($administrative == null) {
                return response()->json([
                    'message' => 'No se encuentra el administrativo',
                    'code' => 404
                ], 404);
            }
            $administrative->delete();
            return response()->json([
                'message' => 'Administrativo eliminado',
                'code' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al eliminar el administrativo',
                'code' => 500
            ], 500);
        }
    }
}
