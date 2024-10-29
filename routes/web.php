<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Cada ruta de la app tiene una funcion de un controlador que determina que devuelve esa ruta

// Importa el orden en el que se definen las rutas.

// Vista por defecto, deberia ser el login?
Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/books', [BookController::class,'index'])->name('books');
    Route::get('/books/create', [BookController::class,'create'])->name('create');
    Route::post('/books/save', [BookController::class,'store'])->name('store');
    Route::get('/books/{book}/edit', [BookController::class,'edit'])->name('edit');
    Route::put('/books/{book}/update', [BookController::class,'update'])->name('update');
    Route::delete('/books/{book}/delete', [BookController::class,'delete'])->name('delete');


    Route::get('/Prestamos', function(){
        return 'Prestamos';
    });
    Route::get('/Devoluciones', function(){
        return 'Devoluciones';
    });
    Route::get('/Clientes', function(){
        return 'Clientes';
    });
    Route::get('/Administradores', function(){
        return 'Administradores';
    });
    Route::get('/Estadisticas', function(){
        return 'Estadisticas';
    });



});

require __DIR__.'/auth.php';
