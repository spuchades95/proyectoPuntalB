<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use App\Models\Facility;
use App\Models\Role;
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $nombreRol = Role::find($this->Rol_id);
        $instalacion = Facility::find($this->Instalacion_id);
        return [
            'Nombre Completo' => $this->NombreCompleto,
            'Nombre Usuario' => $this->NombreUsuario ,
            'Email' => $this->email,
            'Rol' => $nombreRol->NombreRol, 
            'Instalacion' =>  $instalacion->Ubicacion, 
            'DNI' => $this->DNI,
            'Telefono' => $this->Telefono,
            'Direccion' => $this->Direccion,
            'Imagen' => $this->Imagen,
            'Habilitado' => $this->Habilitado,
           
        ];
    }
}
