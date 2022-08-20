<?php

use App\Http\Controllers\Api\AboutUsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DataTimeController;
use App\Http\Controllers\Api\DateTimeController;
use App\Http\Controllers\Api\SalonController;
use App\Http\Controllers\Api\ServicesController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\ContactUsController;
use App\Models\DataTime;
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
Route::get('auth/users', [AuthController::class, 'allUsers']);


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



// Read salons
Route::get('admin/salons', [SalonController::class, 'getSalons']);

// Read one service
Route::get('admin/salons/{id}', [SalonController::class, 'salonById']);

// Add new service
Route::post('admin/salons/create', [SalonController::class, 'createSalon']);

// Edit salon

Route::put('admin/salons/update/{id}', [SalonController::class, 'updateSalons']);

// Delete service

Route::delete('admin/services/delete/{id}', [ServicesController::class, 'deleteSalons']);


// send messages

Route::post('admin/contactus', [ContactUsController::class, 'send']);


Route::get('admin/about', [AboutUsController::class, 'read']);
Route::post('admin/about/create', [AboutUsController::class, 'create']);
Route::put('admin/about/update', [AboutUsController::class, 'read']);
Route::get('admin/about', [AboutUsController::class, 'read']);



//datatime

Route::apiResource('admin/datetime', DateTimeController::class);
Route::get('users', function(Request $request){
    $user = User::all();

    return $user;
});
Route::get('user/{id}', function($id, DataTime $datajson){
    $user = User::find($id);
     return $user;

});


//slider

Route::apiResource('admin/slider', SliderController::class);

