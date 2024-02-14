<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Boat;
use Illuminate\Http\Request;
 

class BoatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Boat::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $boat = Boat::create($request->all());
        $boat->save();
        return response()->json($boat, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Boat $boat)
    {
        $boat = Boat::find($boat);

        // if ($boat) {
        //     return response()->json($boat, 200);
        // } else {
        //     return response()->json('Boat not found', 404);
        // }
        if ($boat == null) {
            return response()->json([
                'message' => 'No se encuentra la embarcacion',
                'code' => 404
            ], 404);
        }
        return response()->json([
            'data' => $boat,
            'code' => 200
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Boat $boat)
    {
        
        try {
            // Verifica si la embarcación existe
            if (!$boat) {
                return response()->json(['error' => 'Embarcación no encontrada'], 404);
            }

          

            // Obtiene los datos actuales antes de la actualización
            $oldData = $boat->toArray();
       
            $updateResult = Boat::where('Matricula', $request->Matricula)->update($request->except(['Matricula', 'created_at', 'updated_at']));

          
            if ($updateResult) {
                // Obtiene los datos después de la actualización
                $boat = Boat::find($request->Matricula);
                $newData = $boat->toArray();
             

                return response()->json($boat, 200);
            } else {
                return response()->json(['error' => 'Error al actualizar la embarcación'], 500);
            }
        } catch (QueryException $e) {
            // Manejo de errores específicos de consulta SQL
           
            return response()->json(['error' => 'Error interno del servidor'], 500);
        } catch (\Exception $e) {
            // Manejo de otros errores
            
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($matricula)
    {
        try {
            $boat = Boat::find($matricula);
            if ($boat) {
                $boat->delete();
                return response()->json(['message' => 'Embarcación eliminada'], 200);
            } else {
                return response()->json(['error' => 'Embarcación no encontrada'], 404);
            }
        } catch (QueryException $e) {
            // Manejo de errores específicos de consulta SQL
            return response()->json(['error' => 'Error interno del servidor'], 500);
        } catch (\Exception $e) {
            // Manejo de otros errores
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }
}
