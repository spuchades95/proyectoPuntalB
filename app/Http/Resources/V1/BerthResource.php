<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Dock;

class BerthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //  $pantalan = Dock::find($this->Pantalan_id);
        return [
            'Estado' => $this->Estado,
            'Tipo Plaza' => $this->TipoPlaza ,
            'Anio' => $this->Anio,
            'Pantalan ' => $this->plaza->pantalan->Nombre,
            
           
           
        ];
    }
}
