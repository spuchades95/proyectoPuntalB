<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\BaseBerth;
use App\Models\Berth;
use App\Models\Administrative;
use Illuminate\Http\Request;
use App\Http\Resources\V1\BaseBerthResource;
use App\Models\Facility;
use App\Models\Dock;
use App\Models\Rental;
use App\Models\Boat;
use Illuminate\Support\Facades\Log;

class BaseBerthController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function cantidadpb()
    {


        $cantidad = BaseBerth::count();
        return $cantidad;
    }


public function actuFin(Request $request, string $id){
    Log::info($request);
    Log::info($id);
    
    $fechaFinalizacion = $request->input('FechaFinalizacion');

    try {
       
        $rental = Rental::findOrFail($id);
        $rental->FechaFinalizacion = $fechaFinalizacion;
        $rental->save();

        return response()->json($rental, 200);
    } catch (\Exception $e) {
       
        return response()->json(['error' => 'Hubo un problema al actualizar el contrato de alquiler.'], 500);
    }

}




    public function estancia()
    {


        $cantidad = Rental::query()
            ->selectRaw('SUM(DATEDIFF(FechaFinalizacion, FechaInicio)) AS estancia')
            ->value('estancia');
        $cantidadEstancias = Rental::count();

        if ($cantidadEstancias > 0) {
            $duracionMedia = $cantidad / $cantidadEstancias;

            $anyosb = floor($duracionMedia / 365);
            $meses = floor(($duracionMedia % 365) / 30);
            $dias = $duracionMedia % 30;
            return ['anyos' => $anyosb, 'meses' => $meses, 'dias' => $dias];
        }
    }
    public function paratabla()
    {
        $plazasBase = Rental::
        join('base_berths', 'base_berths.id', '=', 'rentals.PlazaBase_id')
        ->join('berths', 'berths.id', '=', 'base_berths.Amarre_id')
        ->join('docks', 'docks.id', '=', 'berths.pantalan_id')
        ->join('facilities', 'facilities.id', '=', 'docks.instalacion_id')
        ->join('boats', 'boats.id', '=', 'rentals.embarcacion_id')

            ->select(
                'rentals.FechaInicio',
                'rentals.FechaFinalizacion',
                'rentals.id As IdAlquiler',
                'berths.Numero AS Numero',
                'berths.Estado AS Estado',
                'docks.Nombre AS Pantalan',
                'berths.TipoPlaza AS tipo',
                'facilities.Ubicacion AS Instalacion',
                'base_berths.Amarre_id AS Plaza',
                'boats.Matricula',
                'boats.Titular'
            )     
            ->whereIn('rentals.id', function($query) {
                $query->selectRaw('MIN(id)')
                      ->from('rentals')
                      ->groupBy('PlazaBase_id');
            })
            ->where('berths.Estado', '=', 'Ocupado')

            ->get();




        return response()->json($plazasBase, 200);
    }
public function eli(Request $request, string $id){

    Log::info($request);
    Log::info($id);
   
 
    $Causa = $request->input('Causa');

    try {
        Log::info($request);
        Log::info($id);
       
        $rental = Rental::findOrFail($id);
        $baseberth = $rental->PlazaBase_id;
        $berth = Berth::findOrFail($baseberth);
        $rental->Causa = $Causa;
        $rental->save();
        $berth->Estado = 'Ocupado'; 
        $berth->save();
        return response()->json($rental, 200);

    } catch (\Exception $e) {

        return response()->json([
            Log::info($e->getMessage()),
            'message' => 'Error al actualizar el amarre base',
            'code' => 500
        ], 500);
    }

}




    public function index()
    {


        $cositas = BaseBerth::with(['plaza.pantalan.instalacion'])
            ->whereHas('plaza', function ($query) {
                $query->where('Estado', 'Disponible');
            })
            ->get();
        $plazasBaseAll = [

            'plazabasedetalles' => BaseBerthResource::collection($cositas)


        ];
        return response()->json($plazasBaseAll, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $baseBerth = BaseBerth::create($request->all());
        $baseBerth->save();
        return response()->json($baseBerth, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $baseBerth = BaseBerth::find($id);

        if ($baseBerth) {
            return new BaseBerthResource($baseBerth);
            // return response()->json($baseBerth, 200);
        } else {
            return response()->json('Amarre base no encontrado', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function alquiler(Request $request, string $id)
    {

        try {
            Log::info($request);
            Log::info($id);
        $baseBerth = BaseBerth::where('Amarre_id', $id)->firstOrFail();
        $embarcacion = $request->input('Embarcacion');
        $FechaInicio = $request->input('FechaInicio');
        $FechaFinalizacion = $request->input('FechaFinalizacion');

        $baseBerth->embarcacion()->attach($embarcacion, [
            'FechaInicio' => $FechaInicio,
            'FechaFinalizacion' => $FechaFinalizacion
        ]);


        $alquiler= Rental::all();
            return response()->json($alquiler, 200);
        } catch (\Exception $e) {

            return response()->json([
                Log::info($e->getMessage()),
                'message' => 'Error al actualizar el amarre base',
                'code' => 500
            ], 500);
        }
    }


    public function update(Request $request, string $id)
    {
        try {

            $baseBerth = BaseBerth::findOrFail($id);
            $baseBerth->save();

            return response()->json($baseBerth, 200);
        } catch (\Exception $e) {

            return response()->json([
                Log::info($e->getMessage()),
                'message' => 'Error al actualizar el amarre base',
                'code' => 500
            ], 500);
        }
    }

    public function administrativoyAmarre(Request $request, string $id)
    {
        try {
            Log::info($request);
            Log::info($id);
            $berth = Berth::findOrFail($id);
            $administrativo = $request->input('Administrativo_id');
            // Verificar si ya existe la asociación en la tabla pivot
        if ($berth->administrativoamarre()->where('administrativo_id', $administrativo)->exists()) {
            return response()->json(['message' => 'La asociación entre el administrativo y el amarre ya existe'], 200);
        }

        // Si no existe, proceder a crear la asociación
        $berth->administrativoamarre()->attach($administrativo);

        return response()->json(['message' => 'Administrativo asociado correctamente al amarre'], 200);
        } catch (\Exception $e) {
            return response()->json([
                Log::info($e->getMessage()),
                'message' => 'Error al asociar el administrativo al amarre',
                'error' => $e->getMessage(),
                'code' => 500
            ], 500);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function updateCausa(Request $request, string $id)
    {

        $baseBerth = Rental::findOrFail($id);
       
        $baseBerth->update([
            'Causa' => $request->Causa,
        ]);
    }
    public function destroy(Request $request, string $id)
    {
        try {

            // Buscar el registro de BaseBerth por su ID
            $baseBerth = BaseBerth::findOrFail($id);


            $berth = Berth::findOrFail($baseBerth->Amarre_id);
            $this->updateCausa($request, $id);
            Log::info('Amarre encontrado: ' . json_encode($this->updateCausa($request, $id)));

            // Guardar los cambios antes de eliminar el registro
            $berth->save();
            Log::info('Amarre encontrado: ' . json_encode($berth));
            // Eliminar el registro de BaseBerth
            // $berth->delete();
            //  $baseBerth->delete();

            // Retornar una respuesta adecuada, por ejemplo, un JSON indicando el éxito de la operación
            return response()->json(['message' => 'BaseBerth eliminado con éxito'], 200);
        } catch (\Exception $e) {
            Log::error('Error al eliminar el amarre base: ' . $e->getMessage());
            // Manejar la excepción si ocurre un error
            return response()->json(['message' => 'Error al eliminar el amarre base', 'code' => 500], 500);
        }
    }
}
