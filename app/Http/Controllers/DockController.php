<?php

namespace App\Http\Controllers;

use App\Models\Dock;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pantalanes = Dock::all();
        return view('amarres.createdos', compact('pantalanes'));
    }

    /**
     * Show the form for creating a new resource.
     */
//    public function create(Request $request)
// {
//      
//        return view('pantalanes.create', [
//             'Instalacion_id' => $Instalacion_id,
//         'instalacion_ubicacion' => $InstalacionUbicacion
//         ]);
//      }

public function create(Request $request)
{
    $Instalacion_id = $request->input('facility');

    if ($Instalacion_id) {
        // Intentar encontrar la instalación por el ID proporcionado
        $instalacion = Facility::find($Instalacion_id);

        if (!$instalacion) {
            return redirect()->back()->with('error', 'La instalación no existe.');
        }
    } else {
        // Si no se proporciona un ID, o si no se encuentra ninguna instalación con ese ID, obtener la última instalación creada
        $instalacion = Facility::latest()->first();
    }

    // Si no hay instalación disponible, regresa con un mensaje de error
    if (!$instalacion) {
        return redirect()->back()->with('error', 'No hay instalaciones creadas.');
    }

    $InstalacionUbicacion = $instalacion->Ubicacion;
    
    return view('pantalanes.create', [
        'Instalacion_id' => $instalacion->id,
        'instalacion_ubicacion' => $InstalacionUbicacion
    ]);
}


public function createdos(Request $request)
{
    $Instalacion_id = $request->input('facility');

    if ($Instalacion_id) {
        // Intentar encontrar la instalación por el ID proporcionado
        $instalacion = Facility::find($Instalacion_id);

        if (!$instalacion) {
            return redirect()->back()->with('error', 'La instalación no existe.');
        }
    } else {
        // Si no se proporciona un ID, o si no se encuentra ninguna instalación con ese ID, obtener la última instalación creada
        $instalacion = Facility::latest()->first();
    }

    // Si no hay instalación disponible, regresa con un mensaje de error
    if (!$instalacion) {
        return redirect()->back()->with('error', 'No hay instalaciones creadas.');
    }

    $InstalacionUbicacion = $instalacion->Ubicacion;
    
    return view('pantalanes.createdos', [
        'Instalacion_id' => $instalacion->id,
        'instalacion_ubicacion' => $InstalacionUbicacion
    ]);
}

//     public function create(Request $request, $id_instalacion)
// {
//     $instalacion = Facility::findOrFail($id_instalacion);
//     $instalacionUbicacion = $instalacion->ubicacion;
    
//     return view('pantalanes.create', [
//         'instalacion_id' => $id_instalacion,
//         'instalacion_ubicacion' => $instalacionUbicacion
//     ]);
// }


public function store(Request $request)
{
    $request->validate([
        'Nombre' => 'required',
        'Ubicacion' => 'required',
        'Descripcion' => 'required',
        'Capacidad' => 'required',
        'FechaCreacion' => 'required',
        'Causa' => 'nullable|string|max:255',
        'Instalacion_id' => 'required',
    ]);
    $pantalanes = new Dock();
    $pantalanes->Nombre = $request->Nombre;
    $pantalanes->Ubicacion = $request->Ubicacion;
    $pantalanes->Descripcion = $request->Descripcion;
    $pantalanes->Capacidad = $request->Capacidad;
    $pantalanes->FechaCreacion = $request->FechaCreacion;
    $pantalanes->Causa = $request->Causa;
    $pantalanes->Instalacion_id = $request->Instalacion_id;
   

    $pantalanes->save();

    $idPantalan = $pantalanes->id;
       Session::put('id_pantalan', $idPantalan);

        return redirect()->route('instalaciones.index')
            ->with('success', 'Dock created successfully.');
    }





    /**
     * Store a newly created resource in storage.
     */
    public function storedos(Request $request)
    {
        $request->validate([
            'Nombre' => 'required',
            'Ubicacion' => 'required',
            'Descripcion' => 'required',
            'Capacidad' => 'required',
            'FechaCreacion' => 'required',
            'Causa' => 'nullable|string|max:255',
            'Instalacion_id' => 'required',
        ]);
        $pantalanes = new Dock();
        $pantalanes->Nombre = $request->Nombre;
        $pantalanes->Ubicacion = $request->Ubicacion;
        $pantalanes->Descripcion = $request->Descripcion;
        $pantalanes->Capacidad = $request->Capacidad;
        $pantalanes->FechaCreacion = $request->FechaCreacion;
        $pantalanes->Causa = $request->Causa;
        $pantalanes->Instalacion_id = $request->Instalacion_id;
       
    
        $pantalanes->save();
    
        $idPantalan = $pantalanes->id;
           Session::put('id_pantalan', $idPantalan);
    
            return redirect()->route('pantalanes.opcionamarres')
                ->with('success', 'Dock created successfully.');
        }
    


    public function opcionAmarres()
    {
        $idPantalan = session('id_pantalan');
        return view('pantalanes.opcionamarres', ['id_pantalan' => $idPantalan]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pantalan = Dock::find($id);
        $Instalacion_id = $pantalan->Instalacion_id;
        $InstalacionUbicacion = Facility::find($Instalacion_id)->Ubicacion;
        return view('pantalanes.show', compact('pantalan', 'InstalacionUbicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pantalan = Dock::find($id);
       $Instalacion_id = $pantalan->Instalacion_id;
        $InstalacionUbicacion = Facility::find($Instalacion_id)->Ubicacion;
        return view('pantalanes.edit', compact('pantalan', 'InstalacionUbicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
  
       $pantalan = Dock::findOrFail($id);
        $pantalan->update($request->all());

        $pantalan->save();
        return redirect()->route('instalaciones.index')
            ->with('success', 'pantalán actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $pantalan = Dock::find($id);
        $pantalan->Causa = $request->input('Causa');
        $pantalan->save();
        $pantalan->delete();
        return redirect()->route('instalaciones.index')
            ->with('success', 'pantalán eliminado correctamente.');
    }
}
