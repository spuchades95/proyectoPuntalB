<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministrativeController;
use App\Http\Controllers\BoatController;
use App\Http\Controllers\CivilGuardController;
use App\Http\Controllers\ConcessionaireController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\DockController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\TransitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BaseBerthController;
use App\Http\Controllers\BerthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

  

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/panel', function () {
    return view('instalaciones.index');
})->middleware(['auth', 'verified'])->name('panel');


Route::middleware(['auth', 'verified', 'checkUserRole'])->group(function () {
    Route::put('/amarres/{amarre}', [BerthController::class, 'update'])->name('amarres.update');
    Route::put('/usuario/{id}', [UserController::class, 'update'])->name('usuarios.update');
    Route::get('amarres/createdos', [BerthController::class, 'createdos'])->name('amarres.createdos');
    Route::post('amarres/createdos', [BerthController::class, 'storedos'])->name('amarres.storedos');
    Route::resource('amarres', BerthController::class);
    Route::resource('instalaciones', FacilityController::class);
    Route::resource('pantalanes', DockController::class);
    Route::resource('plazasbase', BaseBerthController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('transitos', TransitController::class);
    Route::resource('usuarios', UserController::class);
    Route::get('/panel', PanelController::class)->name('panel.index');
});

require __DIR__.'/auth.php';
