<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\CivilGuard;
use Illuminate\Http\Request;

class CivilGuardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CivilGuard::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $civilGuard = CivilGuard::create($request->all());
        $civilGuard->save();
        return response()->json($civilGuard, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CivilGuard $civilGuard)
    {
        $civilGuard = CivilGuard::find($civilGuard);

        if ($civilGuard == null) {
            return response()->json([
                'message' => 'No se encuentra el guardia civil',
                'code' => 404
            ], 404);
        }
        return response()->json([
            'data' => $civilGuard,
            'code' => 200
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CivilGuard $civilGuard)
    {
        try {
            // Verifica si el guardia civil existe
            $civilGuard = CivilGuard::find($civilGuard);
            if ($civilGuard == null) {
                return response()->json([
                    'message' => 'No se encuentra el guardia civil',
                    'code' => 404
                ], 404);
            }
            $civilGuard->update($request->all());
            return response()->json($civilGuard, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el guardia civil',
                'code' => 500
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $civilGuard = CivilGuard::find($id);
        if ($civilGuard == null) {
            return response()->json([
                'message' => 'No se encuentra el guardia civil',
                'code' => 404
            ], 404);
        }
        $civilGuard->delete();
        return response()->json([
            'message' => 'Guardia civil eliminado',
            'code' => 200
        ], 200);
    }
}
