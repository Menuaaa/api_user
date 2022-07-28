`<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ServicesController;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('auth/register', [AuthController::class, 'createUser']);
Route::post('auth/login', [AuthController::class, 'loginUser']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Auth::routes(['verify' => true]);

// Read services
Route::get('admin/services', [ServicesController::class, 'getServices']);

// Read one service
Route::get('admin/services/{id}', [ServicesController::class, 'serviceById']);

// Add new service
Route::post('admin/services/create', [ServicesController::class, 'createService']);

// Edit service

Route::put('admin/services/update/{id}', [ServicesController::class, 'updateService']);

// Delete service

Route::delete('admin/services/delete/{id}', [ServicesController::class, 'deleteService']);

