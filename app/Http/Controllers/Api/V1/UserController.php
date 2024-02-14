<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->save();
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
       /* $user = User::find($id);

        if ($user) {
            return response()->json($user, 200);
        } else {
            return response()->json('Usuario no encontrado', 404);
        }*/

        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            // Verifica si el usuario existe
            $user = User::find($user);
            if ($user == null) {
                return response()->json([
                    'message' => 'No se encuentra el usuario',
                    'code' => 404
                ], 404);
            }
            $user->update($request->all());
            return response()->json([
                'data' => $user,
                'code' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el usuario',
                'code' => 500
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response()->json([
                'message' => 'No se encuentra el usuario',
                'code' => 404
            ], 404);
        }
        $user->delete();
        return response()->json([
            'message' => 'Usuario eliminado',
            'code' => 200
        ], 200);
    }
}
