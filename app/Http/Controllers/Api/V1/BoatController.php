<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BoatResource;
use App\Models\Boat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BoatController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     

    public function cantidadem()
    {


        $cantidad = Boat::count();
        return $cantidad;
    }

    public function pais()
    {

        $barcoypais = Boat::select('Origen')
            ->selectRaw('count(*) as total')
            ->groupBy('Origen')
            ->orderByDesc('total')
            ->get();

        $cantidad = $barcoypais->first();
        return $cantidad;
    }


    
    public function tipocomun()
    {

        $tipo = Boat::select('Tipo')
            ->selectRaw('count(*) as total')
            ->groupBy('Tipo')
            ->orderByDesc('total')
            ->get();

        $cantidad = $tipo->first();
        return $cantidad;
    }

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
        // Log::info('Boat created: ' . $boat->all());
        Log::info('Request: ' . json_encode($request->all()));
        Log::info('Request Headers: ' . json_encode($request->header()));
        // if ($request->hasFile('Imagen')) {
        //     // $file = $request->file('Imagen');
        //     // $name = time().$file->getClientOriginalName();
        //     // $file->move(public_path().'/image/', $name);
        //     // // $request->Imagen = $name;
        //     $imagenPath = $request->file('Imagen')->store('public/image');
        //     $boat->Imagen = str_replace('public', 'storage', $imagenPath);
        //     // $boat->Imagen = Storage::url($imagenPath);
        // }
        if ($request->hasFile('Imagen')) {
            $imagenPath = $request->file('Imagen')->store('public/image');
            // Obtén la URL pública de la imagen almacenada
            $url = Storage::url($imagenPath);
            Log::info('URL CREATE: ' . $url);
            // Asigna la URL al atributo Imagen del modelo Boat
            $boat->Imagen = $url;
        }
        $boat->save();
        return response()->json($boat, 201);
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        $boat = Boat::find($id);

        if ($boat) {
            // return response()->json($boat, 200);
            return new BoatResource($boat);
        } else {
            return response()->json('Boat not found', 404);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Boat $boat)
    // {
    //     Log::info('Boat updated: ' . $boat->all());
    //     Log::info('Request: ' . $request);
    //     Log::info('Request: ' . json_encode($request->all()));
    //     try {
    //         // Verifica si la embarcación existe
    //         if (!$boat) {
    //             return response()->json(['error' => 'Embarcación no encontrada'], 404);
    //         }



    //         // Obtiene los datos actuales antes de la actualización
    //         $oldData = $boat->toArray();

    //         $updateResult = Boat::where('id', $request->id)->update($request->except(['id', 'created_at', 'updated_at']));

    //         if ($request->hasFile('Imagen')) {
    //             // Elimina la imagen anterior
    //             Storage::delete(str_replace('storage', 'public', 'image', $oldData['Imagen']));
    //             // Almacena la nueva imagen
    //             $imagenPath = $request->file('Imagen')->store('public/image');
    //             // Obtén la URL pública de la imagen almacenada
    //             $url = Storage::url($imagenPath);
    //             Log::info('URL UPDATE: ' . $url);
    //             // Asigna la URL al atributo Imagen del modelo Boat
    //             $boat->Imagen = $url;
    //             $boat->save();
    //         }


    //         if ($updateResult) {
    //             // Obtiene los datos después de la actualización
    //             $boat = Boat::find($request->id);
    //             $newData = $boat->toArray();


    //             return response()->json($boat, 200);
    //         } else {
    //             return response()->json(['error' => 'Error al actualizar la embarcación'], 500);
    //         }
    //     }  catch (\Exception $e) {
    //         // Manejo de otros errores

    //         return response()->json(['error' => 'Error interno del servidor'], 500);
    //     }
    // }
    public function update(Request $request, $id)
    {

        $boat = Boat::find($id);
        Log::info('Request: ' . json_encode($request->all()));
        // Log::info('Boat updated: ' . $boat->Imagen);
        Log::info('Request Headers: ' . json_encode($request->header()));
        
        if ($boat) {
            $boat->update($request->all());
            if ($request->hasFile('Imagen')) {
                // Elimina la imagen anterior
                Storage::delete(str_replace('storage', 'public', 'image', $boat->Imagen));
                // Almacena la nueva imagen
                $imagenPath = $request->file('Imagen')->store('public/image');
                // Obtén la URL pública de la imagen almacenada
                $url = Storage::url($imagenPath);
                Log::info('URL UPDATE: ' . $url);
                // Asigna la URL al atributo Imagen del modelo Boat
                $boat->Imagen = $url;
                $boat->save();
            }
            return response()->json($boat, 200);
        } else {
            return response()->json('Boat not found', 404);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $boat = Boat::find($id);
            if ($boat) {
                $boat->delete();
                return response()->json(['message' => 'Embarcación eliminada'], 200);
            } else {
                return response()->json(['error' => 'Embarcación no encontrada'], 404);
            }
        } catch (\Exception $e) {
            // Manejo de otros errores
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }
}
