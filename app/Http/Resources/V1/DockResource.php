<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $nombre = $this->Nombre;
        $ubicacion = $this->Ubicacion;
        $capacidad = $this->Capacidad;

        return [
            'Nombre' => $nombre,
            'Ubicacion' => $ubicacion,
            'Capacidad' => $capacidad,
        ];
    }
}
