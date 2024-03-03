<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Facility;
use App\Models\Administrative;
use App\Models\DockWorker;
use App\Models\Berth;
use App\Models\BaseBerth;
use App\Models\Concessionaire;
use App\Models\Rental;
use App\Models\Transit;
use Carbon\Carbon;

class PanelController extends Controller
{
    public function __invoke()
    {
        $totalUsers = User::count();
        $totalroles = Role::count();
        $totalfacilities = Facility::count();
        $totalAdmnistratives = Administrative::count();
        $totalDockWorkers = DockWorker::count();
        $totalConcesionarios = Concessionaire::count();
        $totalPantalanes = Berth::count();
        $totalPlazasBase = BaseBerth::count();
        // $totalTransitos = Transit::count();
        $totalTransitos = 5;
        $amarresOperativos = Berth::where('Estado', 'Operativo')->count();
        $amarresNoOperativos = Berth::where('Estado', 'No operativo')->count();
        $plazasBaseExpiran1mes = Rental::where('FechaFinalizacion', '<', Carbon::now()->addMonth())->count();
        $altasUsuarios = User::where('created_at', '>', Carbon::now()->subMonth())->count();
        $bajasUsuarios = User::onlyTrashed()
        ->where('deleted_at', '>', Carbon::now()->subMonth())
        ->count();
        $labels = [];
        for ($i = 6; $i >= 0; $i--) {
            $month = date('F', strtotime("-$i month"));
            $labels[] = $month;
        }


        $dataPorcentajeAltasBajas = [
            'labels' => ['Altas', 'Bajas'],
            'data' => [$altasUsuarios, $bajasUsuarios],
        ];

        $dataPorcentajeTransPb = [
            'labels' => ['Tránsitos', 'Plazas Base'],
            'data' => [$totalTransitos, $totalPlazasBase],
        ];
        $dataPorcentajeRoles = [
            'labels' => ['Administrativos', 'Trabajadores de muelle', 'Concesionarios'],
            'data' => [$totalAdmnistratives, $totalDockWorkers, $totalConcesionarios],
        ];
        return view('panel.index', compact('totalUsers', 'totalroles', 'totalfacilities', 'dataPorcentajeTransPb', 'dataPorcentajeRoles', 'dataPorcentajeAltasBajas', 'totalAdmnistratives', 'totalDockWorkers', 'totalPantalanes', 'totalPlazasBase', 'amarresOperativos', 'amarresNoOperativos', 'plazasBaseExpiran1mes', 'labels'));
    }
}
