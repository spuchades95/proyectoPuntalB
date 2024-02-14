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
        $berth = Berth::create($request->all());
        $berth->save();
        return response()->json($berth, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Berth $berth)
    {
        $berth = Berth::find($berth);

        if ($berth == null) {
            return response()->json([
                'message' => 'No se encuentra el amarre',
                'code' => 404
            ], 404);
        }
        return response()->json([
            'data' => $berth,
            'code' => 200
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berth $berth)
    {
        try {
            // Verifica si el amarre existe
            $berth = Berth::find($berth);
            if ($berth == null) {
                return response()->json([
                    'message' => 'No se encuentra el amarre',
                    'code' => 404
                ], 404);
            }
            $berth->update($request->all());
            return response()->json($berth, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el amarre',
                'code' => 500
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berth = Berth::find($id);
        if ($berth == null) {
            return response()->json([
                'message' => 'No se encuentra el amarre',
                'code' => 404
            ], 404);
        }
        $berth->delete();
        return response()->json([
            'message' => 'Amarre eliminado',
            'code' => 200
        ], 200);
    }
}
