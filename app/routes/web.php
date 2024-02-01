<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionFilm\FilmsController;

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



Route::get('/',[FilmsController::class,'index'])->name('film.index');
Route::get('/create',[FilmsController::class,'create'])->name('film.create');
Route::post('/ajouter',[FilmsController::class,'store'])->name('film.store');
Route::get('/film/{id}/show',[FilmsController::class,'show'])->name('film.detail');
Route::get('/film/{id}/editer',[FilmsController::class,'edit'])->name('film.edit');
Route::PUT('/film/{id}/update',[FilmsController::class,'update'])->name('film.update');
Route::delete('/film/{id}',[FilmsController::class,'delete'])->name('film.delete');