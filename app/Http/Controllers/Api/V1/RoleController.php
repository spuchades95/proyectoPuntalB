<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Role::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = Role::create($request->all());
        $role->save();
        return response()->json($role, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::find($id);

        if ($role) {
            return response()->json($role, 200);
        } else {
            return response()->json('Rol no encontrado', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        try {
            // Verifica si el rol existe
            $role = Role::find($role);
            if ($role == null) {
                return response()->json([
                    'message' => 'No se encuentra el rol',
                    'code' => 404
                ], 404);
            }
            $role->update($request->all());
            return response()->json([
                'data' => $role,
                'code' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el rol',
                'code' => 500
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        if ($role == null) {
            return response()->json([
                'message' => 'No se encuentra el rol',
                'code' => 404
            ], 404);
        }
        $role->delete();
        return response()->json([
            'message' => 'Rol eliminado',
            'code' => 200
        ], 200);
    }
}
