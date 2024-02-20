<?php

namespace App\Http\Controllers;

use App\Models\Berth;
use App\Models\Dock;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Transit;
use App\Models\BaseBerth;

class BerthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amarres = Berth::all();
        return view('amarres.index', compact('amarres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $Pantalan_id = $request->input('dock');
        $pantalanNombre = Dock::find($Pantalan_id)->Nombre;
        return view('amarres.create', [
            'Pantalan_id' => $Pantalan_id,
            'pantalan_nombre' => $pantalanNombre
        ]);
    }
    public function createdos(Request $request)
    {
        $Pantalan_id = $request->input('dock');
        $pantalanNombre = Dock::find($Pantalan_id)->Nombre;
        return view('amarres.createdos', [
            'Pantalan_id' => $Pantalan_id,
            'pantalan_nombre' => $pantalanNombre
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'Estado' => 'required',
            'TipoPlaza' => 'required',
            'Anio' => 'required',
            'Pantalan_id' => 'required',
        ]);

        $numeroAmarre = $this->generarNumeroAmarre($request->Pantalan_id);

        $amarre = new Berth();
        $amarre->Numero = $numeroAmarre;
        $amarre->Estado = $request->Estado;
        $amarre->TipoPlaza = $request->TipoPlaza;
        $amarre->Anio = $request->Anio;
        $amarre->Pantalan_id = $request->Pantalan_id;
        $amarre->save();


        if ($request->TipoPlaza === 'Transito') {

            $transit = new Transit();
            $transit->Amarre_id = $amarre->id;
            $transit->save();
        } elseif ($request->TipoPlaza === 'Plaza Base') {

            $baseBerth = new BaseBerth();
            $baseBerth->Amarre_id = $amarre->id;
            $baseBerth->save();
        }

        return redirect()->route('instalaciones.index')
            ->with('success', 'Amarre creado correctamente.');
    }
    public function storedos(Request $request)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);
        $cantidad = $request->cantidad;
       

        for ($i = 0; $i < $cantidad; $i++) {

            $numeroAmarre = $this->generarNumeroAmarre($request->Pantalan_id);
            $amarre = new Berth();
            $amarre->Numero = $numeroAmarre;
            $amarre->Pantalan_id = $request->Pantalan_id;
            $amarre->Estado = "Disponible";
            $amarre->TipoPlaza = "Undefined";
            $amarre->Anio= now();
            $amarre->save();
        }

        /*
          $amarre = new Berth();
          $amarre->Numero = $request->Numero;
          $amarre->Estado = $request->Estado;
          $amarre->TipoPlaza = $request->TipoPlaza;
          $amarre->Anio = $request->Anio;
       
          $amarre->Pantalan_id = $request->Pantalan_id;*/

         
        return redirect()->route('instalaciones.index')
            ->with('success', 'Amarre creado correctamente.');
    }

    private function generarNumeroAmarre($pantalanId)
    {
        //  Log::info('Llamada a generarNumeroAmarre con $pantalanId:', [$pantalanId]);
        // Obtener el último número de amarre para el pantalán dado
        $ultimoAmarre = Berth::where('Pantalan_id', $pantalanId)->orderByDesc('Numero')->first();

        // Incrementar el número del amarre en 1 o iniciar en 1 si no hay amarres previos en el pantalán
        $numeroAmarre = $ultimoAmarre ? $ultimoAmarre->Numero + 1 : 1;

        return $numeroAmarre;
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $amarre = Berth::find($id);
        $Pantalan_id = $amarre->Pantalan_id;
        $pantalanNombre = Dock::find($Pantalan_id)->Nombre;

        return view('amarres.show', compact('amarre', 'pantalanNombre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $amarre = Berth::find($id);
        $Pantalan_id = $amarre->Pantalan_id;
        $pantalanNombre = Dock::find($Pantalan_id)->Nombre;
        return view('amarres.edit', compact('amarre', 'pantalanNombre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Estado' => 'required',
            'TipoPlaza' => 'required',
        ]);
        $amarre = Berth::find($id);
        $amarre->update([
            'Estado' => $request->Estado,
            'TipoPlaza' => $request->TipoPlaza,
        ]);
        if ($request->TipoPlaza === 'Transito') {
            $transit = Transit::where('Amarre_id', $id)->first();
            if (!$transit) {
                $baseBerth = BaseBerth::where('Amarre_id', $id)->first();
                $baseBerth->delete();
                $transit = new Transit();
                $transit->Amarre_id = $amarre->id;

            }
            $transit->save();
        } elseif ($request->TipoPlaza === 'Plaza Base') {
            $baseBerth = BaseBerth::where('Amarre_id', $id)->first();
            if (!$baseBerth) {
                $transit = Transit::where('Amarre_id', $id)->first();
                $transit->delete();
                $baseBerth = new BaseBerth();
                $baseBerth->Amarre_id = $amarre->id;

            }
            $baseBerth->save();
        }

        return redirect()->route('instalaciones.index')
            ->with('success', 'Amarre actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $amarre = Berth::find($id);
        $amarre->Causa = $request->input('Causa');
        Log::info('Llamada a en destroycon $amarre:', [$amarre]);
        Log::info('Llamada a causa:', [$amarre->Causa = $request->input('Causa')]);
        $amarre->save();
        $amarre->delete();
        return redirect()->route('instalaciones.index')
            ->with('success', 'Amarre eliminado correctamente.');
    }
}
