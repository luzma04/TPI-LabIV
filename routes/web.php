<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ProfileController;
use App\Models\Loan;
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
    // Rutas de libros
    Route::get('/books', [BookController::class,'index'])->name('books.index');
    Route::get('/books/create', [BookController::class,'create'])->name('books.create');
    Route::post('/books/save', [BookController::class,'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BookController::class,'edit'])->name('books.edit');
    Route::put('/books/{book}/update', [BookController::class,'update'])->name('books.update');
    Route::delete('/books/{book}/delete', [BookController::class,'delete'])->name('books.delete');
    Route::get('/books/{book}/details', [BookController::class,'details'])->name('books.details');

    // Rutas de préstamos
    Route::get('/loans', [LoanController::class,'index'])->name('loans.index');
    Route::get('/loans/create', [LoanController::class,'create'])->name('loans.create');
    Route::post('/loans/store', [LoanController::class, 'store'])->name('loans.store');
    // Route::post('/loans/save', [LoanController::class,'store'])->name('store');
    // Route::get('/loans/{loan}/edit', [LoanController::class,'edit'])->name('edit');
    // Route::put('/loans/{loan}/update', [LoanController::class,'update'])->name('update');
    // Route::delete('/loans/{loan}/delete', [LoanController::class,'delete'])->name('delete');
    // Route::get('/loans/{loan}/details', [LoanController::class,'details'])->name('details');


    Route::get('/returns', function(){
        return view('returns');
    })->name('returns');

    Route::get('/clients', function(){
        return view('clients');
    })->name('clients');

    Route::get('/admins', function(){
        return view('admins');
    })->name('admins');
    
    Route::get('/statistics', function(){
        return view('stadistics');
    })->name('stadistics');



});

require __DIR__.'/auth.php';
