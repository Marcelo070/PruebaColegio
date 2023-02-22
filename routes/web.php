<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\NotasController;
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

Route::get('/', [AlumnosController::class,"show"])->name("alumnos.index");


Route::post('/registrar-alumno', [AlumnosController::class,"create"])->name("alumnos.create");

Route::post('/editar-alumno', [AlumnosController::class,"update"])->name("alumnos.update");

Route::get('/eliminar-alumno-{id}', [AlumnosController::class,"delete"])->name("alumnos.delete");

//Falta retonar a vista principal
Route::get('/crear-curso-{id}', [AlumnosController::class,"createCourse"])->name("alumnos.createCourse");

Route::get('/notas-{id}',[NotasController::class,"show"])->name("notas.index");

Route::post('/notas-editar',[NotasController::class,"update"])->name("notas.update");
