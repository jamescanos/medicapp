<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Middleware Perfil Admin */
Route::middleware(['auth', 'admin'])->group(function () {
    
    //Especialidades
    Route::get('/especialidades', [App\Http\Controllers\Admin\SpecialtyController::class, 'index']);
    Route::get('/especialidades/create', [App\Http\Controllers\Admin\SpecialtyController::class, 'create']);
    Route::get('/especialidades/{specialty}/edit', [App\Http\Controllers\Admin\SpecialtyController::class, 'edit']);
    Route::post('/especialidades', [App\Http\Controllers\Admin\SpecialtyController::class, 'sendData']);
    Route::put('/especialidades/{specialty}', [App\Http\Controllers\Admin\SpecialtyController::class, 'update']);
    Route::delete('/especialidades/{specialty}', [App\Http\Controllers\Admin\SpecialtyController::class, 'destroy']);

    // Rutas Médicos
    Route::resource('/medicos', 'App\Http\Controllers\Admin\DoctorController');

    // Rutas Pacientes
    Route::resource('/pacientes', 'App\Http\Controllers\Admin\PatientController');

});

/* Middleware Perfil Doctor */
Route::middleware(['auth', 'doctor'])->group(function () {

    Route::get('/horario', [App\Http\Controllers\Doctor\HorarioController::class, 'edit']);
    Route::post('/horario', [App\Http\Controllers\Doctor\HorarioController::class, 'store']);

});