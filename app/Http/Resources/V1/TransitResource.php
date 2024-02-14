<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Boat;
use App\Models\Facility;
use App\Models\Dock;
use App\Models\Berth;

class TransitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        $embarcacion = Boat::find($this->author_id);
        $instalacion = Facility::find($this->facility_id);
        $pantalan = Dock::find($this->dock_id);
        $amarre = Berth::find($this->berth_id);

        $ubicacion = '';
        if ($instalacion) {
            $ubicacion .= $instalacion->Ubicacion;
        }
        if ($pantalan) {
            $ubicacion .= ' - ' . $pantalan->Nombre;
        }
        if ($amarre) {
            $ubicacion .= ' - Amarre ' . $amarre->id;
        }

        return [
            'FechaEntrada' => $this->FechaEntrada,
            'FechaSalida' => $this->FechaSalida,
            'Embarcacion' => $embarcacion ? $embarcacion->Matricula : null,
            'Ubicacion' => $ubicacion,
            'Patron' => $embarcacion ? $embarcacion->Titular : null,
        ];
    }
}
