<?php

use App\Http\Controllers\Api\ServicesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');
Route::get('/admin', function () {
    return view('admin.includes.nav');
});
Route::get('/admin/services', [ServicesController::class, 'index']);
Route::post('/admin/edit_service/update/{id}', [ServicesController::class, 'update_func']);
Route::get('/admin/edit_service/{id}', [ServicesController::class, 'edit_function'])->name('services.update');
Route::get('/admin/add_services', [ServicesController::class, 'add_service'])->name('services.add_page');
Route::post('/admin/services/create', [ServicesController::class, 'create_service'])->name('services.add');
Route::get('/admin/delete/{id}', [ServicesController::class, 'delete'])->name('services.delete');