<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Transit;
use App\Models\Dock;
use App\Models\Boat;
use App\Models\Facility;
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
         $transits= Transit::all();
         $details = DB::table('Docks As D')
         ->join('Facilities AS F', 'D.instalacion_id', '=', 'F.id')
         ->join('Berths AS B', 'D.id', '=', 'B.pantalan_id')
         ->join('Transits AS T', 'B.id', '=', 'T.amarre_id')
         ->join('Boats AS BT', 'BT.id', '=', 'T.id')
         ->select('D.nombre', 'F.ubicacion','B.Estado', 'B.Numero','BT.id','BT.Matricula','BT.Tipo','BT.Titular','BT.Origen')
         ->get();
        
         $transitsAll = [
             'transits' => $transits,
             'transit_details' => $details
         ];
        // $transits= Transit::all();
        // $details = DB::table('Docks As D')
        // ->join('Facilities AS F', 'D.instalacion_id', '=', 'F.id')
        // ->join('Berths AS B', 'D.id', '=', 'B.pantalan_id')
        // ->join('Transits AS T', 'B.id', '=', 'T.amarre_id')
        // ->select('D.nombre', 'F.ubicacion', 'B.Numero')
        // ->get();
        // $transitsAll = [
        //     'transits' => $transits,
        //     'transit_details' => $details
        // ];

    return response()->json($transitsAll, 200);
    }
*/
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transit = Transit::create($request->all());
        $transit->save();
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
            $transit->update($request->all());
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
