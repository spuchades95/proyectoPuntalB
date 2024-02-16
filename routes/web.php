<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
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

Route::resource('administrativos',AdministrativeController::class);
Route::resource('alquileres',RentalController::class);
Route::resource('amarres',BerthController::class);
Route::resource('concesionarios',ConcessionaireController::class);
Route::resource('embarcaciones',BoatController::class); 
Route::resource('guardiasciviles',CivilGuardController::class);
Route::resource('incidencias',IncidentController::class);
Route::resource('instalaciones',FacilityController::class);
Route::resource('pantalanes',DockController::class);
Route::resource('plazas',BaseController::class);
Route::resource('plazasbase',BaseBerthController::class);
Route::resource('roles',RoleController::class);
Route::resource('transitos',TransitController::class);
Route::resource('tripulantes',CrewController::class);
Route::resource('usuarios',UserController::class);







  

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
*/