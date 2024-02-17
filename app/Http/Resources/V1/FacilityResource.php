<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FacilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 'id' => $this->id,
            'Ubicacion' => $this->Nombre,
            'Dimensiones' => $this->Descripcion,
            'Estado' => $this->Estado,
            'Fecha de creacion' => $this->FechaCreacion,
            
        ];
    }
}
