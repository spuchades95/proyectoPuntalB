<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BoatController extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $matricula = $this->Matricula;
        $origen = $this->Origen;
        $nombre = $this->Nombre;
        $titular = $this->Titular;
        $registro = $this->Numero_registro;

        return [
            'Matricula' => $matricula,
            'Origen' => $origen,
            'Nombre' => $nombre,
            'Titular' => $titular,
            'Numero_registro' => $registro,
        ];
        // return parent::toArray($request);
    }
}
