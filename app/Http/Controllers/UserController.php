<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\Facility;
use App\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rolesId = Role::pluck('id');
        $InstalacionId = Facility::pluck('id');
        return view('usuarios.create', compact('InstalacionId','rolesId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'NombreCompleto' => 'required',
            'NombreUsuario' => 'required',
            'Instalacion_id' => 'required',
            'DNI' => 'required',
            'Telefono' => 'required',
            'Direccion' => 'required',
            'Imagen' => 'nullable|image',
            'Descripcion' => 'nullable|string|max:255',
            'Rol_id' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $usuario = new User();
        $usuario->NombreCompleto = $request->NombreCompleto;
        $usuario->NombreUsuario = $request->NombreUsuario;
        $usuario->Instalacion_id = $request->Instalacion_id;
        $usuario->DNI = $request->DNI;
        $usuario->Telefono = $request->Telefono;
        $usuario->Direccion = $request->Direccion;
        if ($request->hasFile('Imagen')) {
            $usuario->Imagen = $request->file('Imagen')->store('public');
        }
        $usuario->Descripcion = $request->Descripcion;
        $usuario->Rol_id = $request->Rol_id;
        $usuario->email = $request->email;
        $usuario->password = $request->password;



        $usuario->save();
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        

        $usuario = User::find($id);
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = User::find($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'NombreCompleto' => 'required',
        //     'Habilitado' => 'required',
        //     'NombreUsuario' => 'required',
        //     'Instalacion_id' => 'required',
        //     'DNI' => 'required',
        //     'Telefono' => 'required',
        //     'Direccion' => 'required',
        //     'Imagen' => 'nullable|image',
        //     'Descripcion' => 'nullable|string|max:255',
        //     'Rol_id' => 'required',
        //     'Causa' => 'nullable|string|max:255',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required',
        // ]);
        $usuario = User::find($id);
        // $usuario->Nombre = $request->Nombre;
        // $usuario->Apellidos = $request->Apellidos;
        // $usuario->Email = $request->Email;
        // $usuario->Password = $request->Password;
        // $usuario->Telefono = $request->Telefono;
        // $usuario->DNI = $request->DNI;
        // $usuario->Direccion = $request->Direccion;
        // $usuario->FechaNacimiento = $request->FechaNacimiento;
        // $usuario->Rol_id = $request->Rol_id;
        $usuario->update($request->all());
        $usuario->save();
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }
}
