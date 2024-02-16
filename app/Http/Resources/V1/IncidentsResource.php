<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IncidentsResource extends JsonResource
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
            'Titulo' => $this->Titulo,
            'Imagen' => $this->Imagen,
            'Leido' => $this->Leido,
            'Descripcion' => $this->Descripcion,
            
          
        ];


    }
}
