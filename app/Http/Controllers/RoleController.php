<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('roles.index', ['roles'=> Role::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NombreRol' => 'required',
            'Descripcion' => 'required|string',
            'Permisos' => 'required|array',
        ]);

        $permisosSeleccionados = $request->input('Permisos', []);

        if (in_array('eliminacion', $permisosSeleccionados)) {
            
            if (!in_array('lectura', $permisosSeleccionados)) {
                $permisosSeleccionados[] = 'lectura';
            }
            if (!in_array('modificacion', $permisosSeleccionados)) {
                $permisosSeleccionados[] = 'modificacion';
            }
        } elseif (in_array('modificacion', $permisosSeleccionados)) {
    
            if (!in_array('lectura', $permisosSeleccionados)) {
                $permisosSeleccionados[] = 'lectura';
            }
        }

        $role = new Role();
        $role->NombreRol = $request->NombreRol;
        $role->Descripcion =  $request->Descripcion;
        $role->Permisos = implode(', ', $permisosSeleccionados);

        $role->save();

        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rol = Role::find($id);
        $permisosSeleccionados = explode(', ', $rol->Permisos); 
        return view('roles.show', compact('rol', 'permisosSeleccionados'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $rol = Role::find($id);
        $permisosSeleccionados = explode(', ', $rol->Permisos); 
        return view('roles.edit', compact('rol', 'permisosSeleccionados'));

    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());


        $request->validate([
            'NombreRol' => 'required',
            'Descripcion' => 'required|string',
            'Permisos' => 'required|array',
        ]);
        $permisosSeleccionados = $request->input('Permisos', []);

        if (in_array('eliminacion', $permisosSeleccionados)) {
            
            if (!in_array('lectura', $permisosSeleccionados)) {
                $permisosSeleccionados[] = 'lectura';
            }
            if (!in_array('modificacion', $permisosSeleccionados)) {
                $permisosSeleccionados[] = 'modificacion';
            }
        } elseif (in_array('modificacion', $permisosSeleccionados)) {
    
            if (!in_array('lectura', $permisosSeleccionados)) {
                $permisosSeleccionados[] = 'lectura';
            }
        }

        $role->NombreRol = $request->NombreRol;
        $role->Descripcion =  $request->Descripcion;
        $role->Permisos = implode(', ', $permisosSeleccionados);

        $role->save();

        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        $role = Role::findOrFail($id);
        $role->Causa = $request->input('Causa');
        $role->save();
        $role->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
