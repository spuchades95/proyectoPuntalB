<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use Illuminate\Http\Request;
use App\Http\Resources\V1\IncidentsResource;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Incident::all();
        $incidentes = Incident::with('administrativo', 'guardamuelles')->get();
        $incidentesConNombres = $incidentes->map(function ($incidente) {
            $guardamuellesNombre = User::find($incidente->Guardamuelle_id)->NombreUsuario;
            $administrativoNombre = User::find($incidente->Administrativo_id)->NombreUsuario;
            return [
                'id' => $incidente->id,
                'Titulo' => $incidente->Titulo,
                'Imagen' => $incidente->Imagen,
                'Leido' => $incidente->Leido,
                'Guardamuelle_id' => $incidente->Guardamuelle_id, // ID del dock worker
                'Guardamuelle_nombre' => $guardamuellesNombre,
                'Administrativo_id' => $incidente->Administrativo_id, // ID del administrador
                'Administrativo_nombre' => $administrativoNombre,
                'Descripcion' => $incidente->Descripcion,
                // 'created_at' => $incidente->created_at,
                // 'updated_at' => $incidente->updated_at,
            ];
        });
        return response()->json($incidentesConNombres);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incident = Incident::create($request->all());
        $incident->save();
        return response()->json($incident, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $incident = Incident::find($id);

        if ($incident) {
            // return new IncidentController($incident);
            return response()->json($incident, 200);
        } else {
            return response()->json('Incidente no encontrado', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Verifica si el incidente existe
            $incident = Incident::find($id);
            if ($incident == null) {
                return response()->json([
                    'message' => 'No se encuentra el incidente',
                    'code' => 404
                ], 404);
            }
          
            
            $incident->update($request->all());
            return response()->json([
                'data' => $incident,
                'code' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el incidente',
                'code' => 500
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $incident = Incident::find($id);
        if ($incident == null) {
            return response()->json([
                'message' => 'No se encuentra el incidente',
                'code' => 404
            ], 404);
        }
        $incident->delete();
        return response()->json([
            'message' => 'Se ha eliminado el incidente',
            'code' => 200
        ], 200);
    }
}
