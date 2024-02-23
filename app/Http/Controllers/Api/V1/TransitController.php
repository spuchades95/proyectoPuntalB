<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Transit;
use Illuminate\Http\Request;
use App\Http\Resources\V1\TransitResource;
class TransitController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function index(){


    
$cositas = Transit::with(['plaza.pantalan.instalacion'])
->whereHas('plaza', function($query) {
    $query->where('Estado', 'Disponible');
})
->get();
$plazasBaseAll=[

    'plazabasedetalles' => TransitResource::collection($cositas)


] ;
        return response()->json($plazasBaseAll, 201);
}



     /*
    public function index()
    {
        return Transit::all();
    }
*/
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transit = Transit::create($request->all());
        $transit->save();

         // Añadir ID de la embarcación seleccionada en la tabla intermedia transit_boats
         $boatId = $request->input('boat_id');
         $transit->boats()->sync([$boatId]);
         
        return response()->json($transit, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transit = Transit::find($id);

        if ($transit) {
            return response()->json($transit, 200);
        } else {
            return response()->json('Tránsito no encontrado', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Transit $transit)
    // {
    //     try {
    //         // Verifica si el tránsito existe
    //         $transit = Transit::find($transit);
    //         if ($transit == null) {
    //             return response()->json([
    //                 'message' => 'No se encuentra el tránsito',
    //                 'code' => 404
    //             ], 404);
    //         }
    //         $transit->update($request->all());
    //         return response()->json([
    //             'data' => $transit,
    //             'code' => 200
    //         ], 200);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'message' => 'Error al actualizar el tránsito',
    //             'code' => 500
    //         ], 500);
    //     }
    // }

    public function update(Request $request, Transit $transit)
{
    try {
        // Verifica si el tránsito existe
        $transit = Transit::find($transit);
        if ($transit == null) {
            return response()->json([
                'message' => 'No se encuentra el tránsito',
                'code' => 404
            ], 404);
        }

        // Actualizar campos de la tabla transits
        $transit->fecha_entrada = $request->input('fecha_entrada');
        $transit->fecha_salida = $request->input('fecha_salida');
        $transit->instalacion = $request->input('instalacion');
        $transit->pantalan = $request->input('pantalan');
        $transit->amarre = $request->input('amarre');
        $transit->save();

       

        return response()->json([
            'data' => $transit,
            'code' => 200
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error al actualizar el tránsito',
            'code' => 500
        ], 500);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transit = Transit::find($id);

        if ($transit) {
            $transit->delete();
            return response()->json('Tránsito eliminado', 200);
        } else {
            return response()->json('Tránsito no encontrado', 404);
        }
    }
}
