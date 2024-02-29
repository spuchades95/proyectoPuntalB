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
use App\Models\Rental;
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
        $totalPantalanes = Berth::count();
        $totalPlazasBase = BaseBerth::count();
        $amarresOperativos = Berth::where('Estado', 'Operativo')->count();
        $amarresNoOperativos = Berth::where('Estado', 'No operativo')->count();
        $plazasBaseExpiran1mes = Rental::where('FechaFinalizacion', '<', Carbon::now()->addMonth())->count();
      

        $data = [
            'labels' => ['January', 'February', 'March', 'April', 'May'],
            'data' => [65, 59, 80, 81, 56],
        ];
        return view('panel.index', compact('totalUsers', 'totalroles', 'totalfacilities', 'data', 'totalAdmnistratives', 'totalDockWorkers', 'totalPantalanes', 'totalPlazasBase', 'amarresOperativos', 'amarresNoOperativos', 'plazasBaseExpiran1mes'));
    }
}
