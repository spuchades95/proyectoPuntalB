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
        $baseBerth = BaseBerth::create($request->all());
        $baseBerth->save();
        return response()->json($baseBerth, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $baseBerth = BaseBerth::find($id);

        if ($baseBerth) {
            return response()->json($baseBerth, 200);
        } else {
            return response()->json('Amarre base no encontrado', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BaseBerth $baseBerth)
    {
        try {
            // Verifica si el amarre base existe
            $baseBerth = BaseBerth::find($baseBerth);
            if ($baseBerth == null) {
                return response()->json([
                    'message' => 'No se encuentra el amarre base',
                    'code' => 404
                ], 404);
            }
            $baseBerth->update($request->all());
            return response()->json($baseBerth, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el amarre base',
                'code' => 500
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $baseBerth = BaseBerth::find($id);
        if ($baseBerth == null) {
            return response()->json([
                'message' => 'No se encuentra el amarre base',
                'code' => 404
            ], 404);
        }
        $baseBerth->delete();
        return response()->json([
            'message' => 'Amarre base eliminado',
            'code' => 200
        ], 200);
    }
}
