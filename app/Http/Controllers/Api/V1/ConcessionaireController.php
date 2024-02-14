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
        $concessionaire = Concessionaire::create($request->all());
        $concessionaire->save();
        return response()->json($concessionaire, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $concessionaire = Concessionaire::find($id);

        if ($concessionaire) {
            return response()->json($concessionaire, 200);
        } else {
            return response()->json('Concesionario no encontrado', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Concessionaire $concessionaire)
    {
        try {
            // Verifica si el concesionario existe
            $concessionaire = Concessionaire::find($concessionaire);
            if ($concessionaire == null) {
                return response()->json([
                    'message' => 'No se encuentra el concesionario',
                    'code' => 404
                ], 404);
            }
            $concessionaire->update($request->all());
            return response()->json([
                'data' => $concessionaire,
                'code' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el concesionario',
                'code' => 500
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $concessionaire = Concessionaire::find($id);
        if ($concessionaire == null) {
            return response()->json([
                'message' => 'No se encuentra el concesionario',
                'code' => 404
            ], 404);
        }
        $concessionaire->delete();
        return response()->json([
            'message' => 'Concesionario eliminado',
            'code' => 200
        ], 200);
    }
}
