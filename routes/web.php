<?php

use App\Http\Controllers\Api\AboutUsController;
use App\Http\Controllers\Api\SalonController;
use App\Http\Controllers\Api\ServicesController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\mailController;
use App\Mail\LoginMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');
Route::get('/admin', function () {
    return view('admin.includes.nav');
});

//services

Route::get('/admin/services', [ServicesController::class, 'index'])->name('services.index');
Route::post('/admin/edit_service/update/{id}', [ServicesController::class, 'update_func'])->name('services.update');
Route::get('/admin/edit_service/{id}', [ServicesController::class, 'edit_function'])->name('services.edit');
Route::get('/admin/add_services', [ServicesController::class, 'add_service'])->name('services.add_page');
Route::post('/admin/services/create', [ServicesController::class, 'create_service'])->name('services.add');
Route::get('/admin/services/delete/{id}', [ServicesController::class, 'delete'])->name('services.delete');

//recomended salons

Route::get('/admin/salons', [SalonController::class, 'index'])->name('salons.index');
Route::post('/admin/edit_salon/update/{id}', [SalonController::class, 'update_func'])->name('salons.update');
Route::get('/admin/edit_salon/{id}', [SalonController::class, 'edit_function'])->name('salons.update')->name('salons.edit');
Route::get('/admin/add_salons', [SalonController::class, 'add_salon'])->name('salons.add_page');
Route::post('/admin/salons/create', [SalonController::class, 'create_salon'])->name('salons.add');
Route::get('/admin/salons/delete/{id}', [SalonController::class, 'delete'])->name('salons.delete');

// about us

Route::get('/admin/aboutus', [AboutUsController::class, 'index'])->name('aboutus.index');
Route::post('admin/edit_aboutus/update/{id}', [AboutUsController::class, 'update_func'])->name('updateAboutUs');
Route::get('admin/edit_aboutus/{id}', [AboutUsController::class, 'edit_function'])->name('editAboutUs');
Route::get('/admin/add_aboutus', [AboutUsController::class, 'add_aboutus'])->name('addAboutUs');
Route::post('/admin/aboutus/create', [AboutUsController::class, 'create_aboutus'])->name('createAboutUs');
Route::get('/admin/about/delete/{id}', [AboutUsController::class, 'delete_aboutus'])->name('deleteAboutUs');

Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
Route::post('admin/users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('admin/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::get('/admin/users/add', [UserController::class, 'add'])->name('users.add');
Route::post('/admin/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/admin/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');

