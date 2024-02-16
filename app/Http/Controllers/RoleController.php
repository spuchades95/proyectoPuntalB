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
            'Permisos' => 'required',
        ]);

        $role = new Role();
        $role->NombreRol = $request->NombreRol;
        $role->Permisos = $request->Permisos;

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
        return view('roles.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rol = Role::find($id);
        return view('roles.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $rol = Role::findOrFail($id);
        $rol->update($request->all());
       

        $rol->save();

        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol = Role::find($id);
        $rol->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
