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
// Route::put('/roles/{role}', 'RoleController@update')->name('roles.update');
Route::put('/amarres/{amarre}', [BerthController::class, 'update'])->name('amarres.update');
Route::put('/usuario/{id}', [UserController::class, 'update'])->name('usuarios.update');
// Route::put('/amarres/{amarre}', 'BerthController@update')->name('amarres.update');
Route::get('amarres/createdos', [BerthController::class, 'createdos'])->name('amarres.createdos');
Route::post('amarres/createdos', [BerthController::class, 'storedos'])->name('amarres.storedos');

Route::resource('administrativos',AdministrativeController::class);
Route::resource('alquileres',RentalController::class);
Route::resource('amarres',BerthController::class);
Route::resource('concesionarios',ConcessionaireController::class);
Route::resource('embarcaciones',BoatController::class); 
Route::resource('guardiasciviles',CivilGuardController::class);
Route::resource('incidencias',IncidentController::class);

Route::resource('transitos',TransitController::class);
Route::resource('tripulantes',CrewController::class);
Route::resource('usuarios',UserController::class);
// Route::get('/panel', PanelController::class)->name('panel');


Route::group(['middleware' => 'Concesionario'], function(){

    Route::resource('instalaciones',FacilityController::class);
    Route::resource('pantalanes',DockController::class);
    Route::resource('plazasbase',BaseBerthController::class);
    Route::resource('roles',RoleController::class);

});



  

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('roles');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', function () {
        // Lógica para redirigir a tus partes específicas basadas en el rol del usuario
        if (auth()->user()->Rol_id == 1) {
            return redirect()->route('instalaciones.index');
        } else {
            // Redirigir a otra parte para otros roles o usuarios
            return redirect()->route('welcome');
        }
    })->name('dashboard');








});

require __DIR__.'/auth.php';
