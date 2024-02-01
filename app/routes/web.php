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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[FilmsController::class,'index'])->name('film.index');
Route::get('/create',[FilmsController::class,'create'])->name('film.create');
Route::get('/ajouter',[FilmsController::class,'store'])->name('film.store');
Route::get('/film/{id}',[FilmsController::class,'show'])->name('film.show');
Route::get('/film/{id}',[FilmsController::class,'edit'])->name('film.edit');
Route::PUT('/film/{id}',[FilmsController::class,'update'])->name('film.update');
Route::PUT('/film/{id}',[FilmsController::class,'delete'])->name('film.delete');