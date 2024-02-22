<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\BaseBerth;
use App\Models\Berth;
use App\Models\Administrative;
use Illuminate\Http\Request;
use App\Http\Resources\V1\BaseBerthResource;
use Illuminate\Support\Facades\Log;

class BaseBerthController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function cantidadpb(){
      
        
        $cantidad= BaseBerth::count();
        return $cantidad;
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
    public function update(Request $request, string $id)
    {
        try {

            $baseBerth = BaseBerth::findOrFail($id);
            $baseBerth->FechaEntrada = $request->FechaEntrada;
            $baseBerth->FinContrato = $request->FinContrato;
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
            $berth = Berth::findOrFail($id);
            $administrative = Administrative::findOrFail($request->Administrativo_id);
            $berth->administrativeamarre()->attach($administrative->id);

            return response()->json(['message' => 'Administrativo asociado correctamente al amarre'], 200);
        } catch (\Exception $e) {
            return response()->json([
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

        $baseBerth = BaseBerth::findOrFail($id);
        $berth = Berth::findOrFail($baseBerth->Amarre_id);
        $berth->update([
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
