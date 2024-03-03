<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Crew;
use App\Models\TransitCrew;
use App\Models\TransitBoat;
use Illuminate\Support\Facades\DB; // Importa la clase DB


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

        return response()->json($crew, 201);
    }

    public function storeConId(Request $request)
{
    // Registra la información del request en el log
    Log::info('Request data:', $request->all());
    
    // Obtiene el ID del transito desde la solicitud
    // Crea una nueva instancia de Crew utilizando los datos del request y lo guarda en la base de datos
    $crew = Crew::create($request->all());
    $crew->save();

    // Crea una nueva instancia de TransitCrew y establece las relaciones con los IDs del transito y el tripulante
    $transitCrew = new TransitCrew([
        'Tripulante_id' => $crew->id,
        'Transito_id' => $request->input('idTransito.transito_id'),
    ]);
    $transitCrew->save();

    // Retorna una respuesta JSON con los datos de la tripulación (crew) y un código de estado 201 (Created)
    return response()->json($crew, 201);
}

function eliminar($id)
{
    Log::info( $id);
    try {
        TransitCrew::where('Transito_id', $id)->delete();
        return response()->json(['message' => 'Los registros en transit_crew relacionados con el ID de tránsito '.$id.' han sido borrados exitosamente.'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Ha ocurrido un error al intentar borrar los registros en transit_crew: '.$e->getMessage()], 500);
    }
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
