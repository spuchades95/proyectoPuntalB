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
Route::put('/roles/{role}', 'RolesController@update')->name('roles.update');

Route::resource('administrativos',AdministrativeController::class);
Route::resource('alquileres',RentalController::class);
Route::resource('amarres',BerthController::class);
Route::resource('concesionarios',ConcessionaireController::class);
Route::resource('embarcaciones',BoatController::class); 
Route::resource('guardiasciviles',CivilGuardController::class);
Route::resource('incidencias',IncidentController::class);
Route::resource('instalaciones',FacilityController::class);
Route::resource('pantalanes',DockController::class);
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