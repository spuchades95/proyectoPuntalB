<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseBerthResource extends JsonResource
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
           
            'Fecha entrada' => $this->FechaEntrada,
            'Fin contrato' => $this->FinContrato,
            'Fecha de creacion' => $this->FechaCreacion,
            'Amarre ' => $this->plaza->Numero,
            'Nombre ' => $this->plaza->pantalan->Nombre,
            'Ubicacion' => $this->plaza->pantalan->instalacion->Ubicacion,
        ];
    }
}
