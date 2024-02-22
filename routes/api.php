<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\V1\BaseBerthController;
use App\Http\Controllers\Api\V1\BoatController;
use App\Http\Controllers\Api\V1\CrewController;
use App\Http\Controllers\Api\V1\FacilityController;
use App\Http\Controllers\Api\V1\IncidentController;
use App\Http\Controllers\Api\V1\RoleController;
use App\Http\Controllers\Api\V1\TransitController;
use App\Http\Controllers\Api\V1\BerthController;






/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    // Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    // Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});


Route::post('v1/plazaBase/{id}/administrativoyAmarre', [BaseBerthController::class, 'administrativoyAmarre']);
Route::put('v1/plazaBase/{id}/updateCausa',[BaseBerthController::class , 'updateCausa']);
Route::get('v1/plazaBase/cantidad',[BaseBerthController::class , 'cantidadpb']);
Route::get('v1/transito/cantidad',[TransitController::class , 'cantidadtr']);
Route::get('v1/plaza/porcentaje',[BerthController::class , 'porcentaje']);
Route::get('v1/embarcacion/cantidad',[BoatController::class , 'cantidadem']);
Route::get('v1/embarcacion/pais',[BoatController::class , 'pais']);


Route::apiResource('v1/usuario', App\Http\Controllers\Api\V1\UserController::class);
Route::apiResource('v1/rol', App\Http\Controllers\Api\V1\RoleController::class);
Route::apiResource('v1/transito', App\Http\Controllers\Api\V1\TransitController::class);
Route::apiResource('v1/administrativo', App\Http\Controllers\Api\V1\AdministrativeController::class);
Route::apiResource('v1/plazaBase', App\Http\Controllers\Api\V1\BaseBerthController::class);
Route::apiResource('v1/guardiaCivil', App\Http\Controllers\Api\V1\CivilGuardController::class);
Route::apiResource('v1/concesionario', App\Http\Controllers\Api\V1\ConcessionaireController::class);
Route::apiResource('v1/tripulante', App\Http\Controllers\Api\V1\CrewController::class);
Route::apiResource('v1/plaza', App\Http\Controllers\Api\V1\BerthController::class);
Route::apiResource('v1/guardamuelles', App\Http\Controllers\Api\V1\DockWorkerController::class);
Route::apiResource('v1/instalacion', App\Http\Controllers\Api\V1\FacilityController::class);
Route::apiResource('v1/incidencia', App\Http\Controllers\Api\V1\IncidentController::class);
Route::apiResource('v1/embarcacion', App\Http\Controllers\Api\V1\BoatController::class);
Route::apiResource('v1/pantalan', App\Http\Controllers\Api\V1\DockController::class);




