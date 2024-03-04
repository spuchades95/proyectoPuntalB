<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Transit;
use App\Models\Dock;
use App\Models\Boat;
use App\Models\Facility;
use App\Models\TransitBoat;
use Illuminate\Http\Request;
use App\Http\Resources\V1\TransitResource;

class TransitController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function paratablaTransito()
     {
         $transitoBoat = TransitBoat::
         join('transits', 'transits.id', '=', 'transit_boats.Transito_id')
         ->join('berths', 'berths.id', '=', 'transits.Amarre_id')
         ->join('docks', 'docks.id', '=', 'berths.pantalan_id')
         ->join('facilities', 'facilities.id', '=', 'docks.instalacion_id')
         ->join('boats', 'boats.id', '=', 'transit_boats.Embarcacion_id')
     
             ->select(
                 'transit_boats.FechaEntrada',
                 'transit_boats.FechaSalida',
                 'transit_boats.id As IdAlquiler',
                 'transits.id AS id',
                 'berths.Numero AS Numero',
                 'berths.Estado AS Estado',
                 'docks.Nombre AS Pantalan',
                 'berths.TipoPlaza AS tipo',
                 'facilities.Ubicacion AS Instalacion',
                 'transits.Amarre_id AS Transito',
                 'boats.Matricula',
                 'boats.Titular'
             )     
             ->whereIn('transit_boats.id', function($query) {
                 $query->selectRaw('MIN(id)')
                       ->from('transit_boats')
                       ->groupBy('Transito_id');
             })
             ->where('berths.Estado', '=', 'Ocupado')
     
             ->get();
     
     
     
     
         return response()->json($transitoBoat, 200);
     }


     public function paratablaTransitoGuardia()
     {
         $transitoBoat = TransitBoat::
         join('transits', 'transits.id', '=', 'transit_boats.Transito_id')
         ->join('berths', 'berths.id', '=', 'transits.Amarre_id')
         ->join('docks', 'docks.id', '=', 'berths.pantalan_id')
         ->join('facilities', 'facilities.id', '=', 'docks.instalacion_id')
         ->join('boats', 'boats.id', '=', 'transit_boats.Embarcacion_id')
     
             ->select(
                 'transit_boats.FechaEntrada',
                 'transit_boats.FechaSalida',
                 'transit_boats.id As IdAlquiler',
                 'berths.Numero AS Numero',
                 'berths.Estado AS Estado',
                 'docks.Nombre AS Pantalan',
                 'berths.TipoPlaza AS tipo',
                 'facilities.Ubicacion AS Instalacion',
                 'transits.Amarre_id AS Transito',
                 'transits.id AS id',
                 'boats.Matricula',
                 'boats.Titular',
                 'boats.Tipo',
                 'boats.Origen',
                 'transits.Estatus',
                 'facilities.Ubicacion',

             )     
             ->whereIn('transit_boats.id', function($query) {
                 $query->selectRaw('MIN(id)')
                       ->from('transit_boats')
                       ->groupBy('Transito_id');
             })
             ->where('berths.Estado', '=', 'Ocupado')
     
             ->get();
     
     
     
     
         return response()->json($transitoBoat, 200);
     }

     public function updateTransito($id, Request $request)
     {
         try {
             // Encuentra el registro de TransitBoat por su ID
             $transitBoat = TransitBoat::find($id);
             
             // Actualiza las fechas de entrada y salida con los valores proporcionados en la solicitud
             $transitBoat->update([
                 'FechaEntrada' => $request->input('FechaEntrada'),
                 'FechaSalida' => $request->input('FechaSalida'),
             ]);
             
             // Guarda los cambios
             $transitBoat->save();
     
             // Retorna una respuesta adecuada si la actualización se realizó con éxito
             return response()->json([
                 'message' => 'TransitBoat actualizado correctamente.',
                 'transitBoat' => $transitBoat
             ], 200);
         } catch (\Exception $e) {
             // Maneja cualquier excepción que pueda ocurrir durante el proceso de actualización
             return response()->json([
                 'message' => 'Error al actualizar el TransitBoat.',
                 'error' => $e->getMessage()
             ], 500);
         }
     }



    public function cantidadtr()
    {


        $cantidad = Transit::count();
        return $cantidad;
    }

    public function idTransito($amarre)
    {
        $transito = Transit::where('Amarre_id', $amarre)->first();
        if ($transito) {
            return response()->json(['transito_id' => $transito->id], 200);
        } else {
            return response()->json(['message' => 'No se encontró ningún tránsito con el número de amarre proporcionado'], 404);
        }
    }
    

    public function estancia()
    {


        $cantidad = TransitBoat::query()
            ->selectRaw('SUM(DATEDIFF(FechaSalida, FechaEntrada)) AS estancia')
            ->value('estancia');
        $cantidadEstancias = TransitBoat::count();

        if ($cantidadEstancias > 0) {

            $meses = floor($cantidad / 30);
            $dias = $cantidad % 30;

            return ['meses' => $meses, 'dias' => $dias];
        }
    }





    // public function index(){



     
public function index()
{
    $transitsAll = DB::table('Transits AS T')
    ->join('Transit_Boats AS TB', 'TB.Transito_id', '=', 'T.id')
    ->join('Berths AS B', 'B.id', '=', 'T.amarre_id')
    ->join('docks AS D', 'D.id', '=', 'B.pantalan_id')
    ->join('Facilities AS F', 'F.id', '=', 'D.instalacion_id')
    ->join('Boats AS BT', function ($join) {
        $join->on('BT.id', '=', 'TB.Embarcacion_id')
             ->whereNull('BT.deleted_at');
    })
    ->whereIn('TB.Transito_id', function($query) {
        $query->selectRaw('MAX(Transito_id)')
              ->from('Transit_Boats')
              ->groupBy('Transito_id');
    })
   
    ->select(
        'T.*', // Select all fields from the Transits table
        'TB.FechaEntrada',
        'TB.FechaSalida',
        'D.nombre', 
        'F.ubicacion', 
        'B.Estado', 
        'B.Numero', 
        'BT.Matricula', 
        'BT.Tipo', 
        'BT.Titular', 
        'BT.Origen'
    )
    ->where('B.Estado', '=', 'Ocupado') 
    ->get();


    return response()->json($transitsAll, 200);
}

    // $cositas = Transit::with(['plaza.pantalan.instalacion'])
    // ->whereHas('plaza', function($query) {
    //     $query->where('Estado', 'Disponible');
    // })
    // ->get();
    // $plazasBaseAll=[

    // 'transitodetalles' => TransitResource::collection($cositas)


    // ] ;
    //         return response()->json($plazasBaseAll, 201);
    // }

    public function cambiarEstado(Request $request, $id)
    {

        
        // Validar la solicitud
        $request->validate([
            'estatus' => 'required|string|in:llegada,salida',
        ]);
    
        $transito = Transit::findOrFail($id);
       
        // Actualizar el estado del tránsito
    
        $transito->update([
            'Estatus' => $request->estatus, 
        ]);
        
        return response()->json(['message' => 'Estado del tránsito actualizado correctamente'], 200);
    }
    
    public function indexguardamuelles()
    {
      
        $transitsAll = DB::table('Transits AS T')
        ->join('Berths AS B', 'B.id', '=', 'T.amarre_id')
        ->join('Docks AS D', 'D.id', '=', 'B.pantalan_id')
        ->join('Facilities AS F', 'F.id', '=', 'D.instalacion_id')
        ->join('Transit_Boats AS TB', 'TB.transito_id', '=', 'T.id')
        ->join('Boats AS BT', 'BT.id', '=', 'TB.embarcacion_id')
        ->whereNull('T.deleted_at')
        ->whereNull('BT.deleted_at')
        ->select(
            'T.*',
            'D.nombre',
            'F.ubicacion',
            'B.Estado',
            'B.Numero',
            'BT.id AS embarcacion_id',
            'BT.Matricula',
            'BT.Imagen',
            'BT.Tipo',
            'BT.Titular',
            'BT.Origen',
            'TB.FechaSalida',
            'TB.FechaEntrada'
        )
        ->get();
            Log::info($transitsAll);
        return response()->json($transitsAll, 200);
    }
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
        Log::info($request);
        Log::info($transit);
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
