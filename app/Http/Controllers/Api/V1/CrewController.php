<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Crew;
use Illuminate\Http\Request;

class CrewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Crew::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $crew = Crew::create($request->all());
        $crew->save();
        return response()->json($crew, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $crew = Crew::find($id);

        if ($crew) {
            return response()->json($crew, 200);
        } else {
            return response()->json('Tripulación no encontrada', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Crew $crew)
    {
        try {
            // Verifica si la tripulación existe
            $crew = Crew::find($crew);
            if ($crew == null) {
                return response()->json([
                    'message' => 'No se encuentra la tripulación',
                    'code' => 404
                ], 404);
            }
            $crew->update($request->all());
            return response()->json($crew, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar la tripulación',
                'code' => 500
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $crew = Crew::find($id);
        if ($crew == null) {
            return response()->json([
                'message' => 'No se encuentra la tripulación',
                'code' => 404
            ], 404);
        }
        $crew->delete();
        return response()->json([
            'message' => 'Tripulación eliminada',
            'code' => 200
        ], 200);
    }
}
