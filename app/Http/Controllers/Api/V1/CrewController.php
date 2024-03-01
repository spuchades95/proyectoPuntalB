<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Crew;
use App\Models\TransitCrew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CrewController extends Controller
{

    public function mostrar($id)
{
    // Realiza la consulta para recuperar los registros donde idtripulante y idtransito sean iguales a $id
    $idTripulantes = TransitCrew::where('Transito_id', $id)->pluck('Tripulante_id');

    // Realiza la consulta para recuperar los registros de la tabla crew utilizando los IDs de tripulantes obtenidos anteriormente
    $crew = Crew::whereIn('id', $idTripulantes)->get();

    // Devuelve los resultados como una respuesta JSON
    return response()->json($crew, 200);
}
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
        foreach ($crew as $tripulante) {
            // Aquí asumimos que tienes una tabla intermedia llamada "transito_tripulante" con campos "transito_id" y "tripulante_id"
            DB::table('TransitBoat')->insert([
                'Transito_id' => $transitoId,
                'Embarcacion_id' => $tripulante->id
            ]);
        }
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
    public function update(Request $request, Crew $crew, $id)
    {
       
        try {
            // Verifica si la tripulación existe
            $crew = Crew::find($id);
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
