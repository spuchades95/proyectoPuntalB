<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Crew;
use App\Models\TransitCrew;
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
    public function tripulanteTransito($id)
    {
        $crew = TransitCrew::where("Transito_id", $id)->get(); // Corrección: Agrega get() para ejecutar la consulta
        $tripulanteIds = [];
    
        foreach($crew as $c) {
            $tripulanteIds[] = $c->Tripulante_id;
        }
    
        if (!empty($tripulanteIds)) {
            $tripulantes = Crew::whereIn("id", $tripulanteIds)->get(); // Corrección: Usa whereIn para buscar IDs en una lista
            if ($tripulantes->isNotEmpty()) {
                return response()->json($tripulantes, 200);
            } else {
                return response()->json('No se encontraron tripulantes para este tránsito', 404);
            }
        } else {
            return response()->json('No se encontraron tripulantes para este tránsito', 404);
        }
    }
    
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
