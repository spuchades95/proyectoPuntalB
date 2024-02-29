<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DockWorker;
use App\Models\Administrative;
use App\Models\CivilGuard;
use App\Models\Concessionaire;


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
/*

        $usuarios = User::all();
        $Roles = [];
        $Instalacion = [];
        $rol;
        $instalacion;
    
        // Iterar sobre cada usuario para obtener el rol y la instalación
        foreach ($usuarios as $usuario) {
            // Obtener el rol del usuario y almacenarlo en el array $roles
            $rol = Role::find($usuario->Rol_id);
            $Roles[$usuario->id] = $rol;
            // Obtener la instalación del usuario y almacenarla en el array $instalaciones
            $instalacion = Facility::find($usuario->Instalacion_id);
            $Instalacion[$usuario->id] = $instalacion;
        }

       */
        
       $usuarios = User::with('role', 'facility')->get();



       
        return view('usuarios.index', compact('usuarios'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $Roles = Role::all();
        $Instalacion = Facility::all();
        $usuario = User::all();
        return view('usuarios.create', compact('usuario','Roles','Instalacion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'NombreCompleto' => 'required',
            'NombreUsuario' => 'required',
            'Instalacion_id' => 'required',
            'Habilitado' =>'required',
            'DNI' => 'required',
            'Telefono' => 'required',
            'Direccion' => 'required',
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
        $usuario->Habilitado = $request->Habilitado;
        $usuario->Descripcion = $request->Descripcion;
        $usuario->Rol_id = $request->Rol_id;
        switch ($usuario->Rol_id) {
            case "1":
                $concessionaire = new Concessionaire();
                $concessionaire->Usuario_id = $usuario->Rol_id;
                $concessionaire->save();

                break;
            case "2":
                $administrative = new Administrative();
                $administrative->Usuario_id = $usuario->Rol_id;
                $administrative->save();
                break;
            case "3":
                $dockWorker = new DockWorker();
                $dockWorker->Usuario_id = $usuario->Rol_id;
                $dockWorker->save();

                break;
            case "4":
                $civil = new CivilGuard();
                $civil->Usuario_id = $usuario->Rol_id;
                $civil->save();
                break;
            default:
                
                break;
        }
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);



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
        $Roles = Role::find($usuario->Rol_id);
        $Instalacion = Facility::find($usuario->Instalacion_id);
        

        return view('usuarios.show', compact('usuario','Roles','Instalacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Roles = Role::all();
        $Instalacion = Facility::all();
        $usuario = User::find($id);
        return view('usuarios.edit', compact('usuario','Roles','Instalacion'));
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
