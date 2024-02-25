<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Berth;
use Illuminate\Http\Request;

class BerthController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function actualizaEstadoOcupado(string $id){

$amarre= Berth::findOrFail($id);

$amarre->update([
    'Estado' => 'Ocupado',
]);
    }


     public function porcentaje(){
      
        
        $cantidad= Berth::count();

        $ocupadas=Berth::where('Estado',' Ocupada')->count();
        $porcentaje= ($ocupadas/$cantidad)*100;

        return $porcentaje;
     }



     public function plazasbdisponibles(){
      
        
        $plazas= Berth::where('Estado','Disponible')
    ->where('TipoPlaza','Plaza Base')
    ->count();
        return $plazas;
     }

     public function plazasbmantenimiento(){
      
        
        $plazas= Berth::where('Estado','Mantenimiento')
    ->where('TipoPlaza','Plaza Base')
    ->count();
        return $plazas;
     }


     public function plazastrdisponibles(){
      
        
        $plazas= Berth::where('Estado','Disponible')
    ->where('TipoPlaza','Transito')
    ->count();
        return $plazas;
     }


     public function datosOcupacion()
     {
         // Obtener el estado de ocupación de las plazas base
         $plazasBaseOcupadas = Berth::where('TipoPlaza', 'Plaza Base')
                                     ->where('Estado', 'Ocupada')
                                     ->count();
         $plazasBaseLibres = Berth::where('TipoPlaza', 'Plaza Base')
                                  ->where('Estado', 'Disponible')
                                  ->count();
         $plazasBaseEnMantenimiento = Berth::where('TipoPlaza', 'Plaza Base')
                                           ->where('Estado', 'En mantenimiento')
                                           ->count();
     
       
         $transitosOcupados = Berth::where('TipoPlaza', 'Transito')
                                   ->where('Estado', 'Ocupada')
                                   ->count();
         $transitosLibres = Berth::where('TipoPlaza', 'Transito')
                                ->where('Estado', 'Disponible')
                                ->count();
         $transitosEnMantenimiento = Berth::where('TipoPlaza', 'Transito')
                                         ->where('Estado', 'En mantenimiento')
                                         ->count();
     
         return [
             'plazas_base' => [
                 'ocupadas' => $plazasBaseOcupadas,
                 'disponible' => $plazasBaseLibres,
                 'mantenimiento' => $plazasBaseEnMantenimiento
             ],
             'transitos' => [
                 'ocupados' => $transitosOcupados,
                 'disponible' => $transitosLibres,
                 'mantenimiento' => $transitosEnMantenimiento
             ]
         ];
     }












     public function plazastrmantenimiento(){
      
        
        $plazas= Berth::where('Estado','Mantenimiento')
    ->where('TipoPlaza','Transito')
    ->count();
        return $plazas;
     }








    public function index()
    {
        return Berth::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $berth = Berth::create($request->all());
        $berth->save();
        return response()->json($berth, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $berth = Berth::find($id);

        if ($berth) {
            return response()->json($berth, 200);
        } else {
            return response()->json('Amarre no encontrado', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berth $berth)
    {
        try {
            // Verifica si el amarre existe
            $berth = Berth::find($berth);
            if ($berth == null) {
                return response()->json([
                    'message' => 'No se encuentra el amarre',
                    'code' => 404
                ], 404);
            }
            $berth->update($request->all());
            return response()->json($berth, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el amarre',
                'code' => 500
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berth = Berth::find($id);
        if ($berth == null) {
            return response()->json([
                'message' => 'No se encuentra el amarre',
                'code' => 404
            ], 404);
        }
        $berth->delete();
        return response()->json([
            'message' => 'Amarre eliminado',
            'code' => 200
        ], 200);
    }
}
