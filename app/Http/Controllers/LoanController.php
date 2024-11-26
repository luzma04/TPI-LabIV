<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;


class LoanController extends Controller
{

    /*public function index()
    {
        $loans = Loan::with('user', 'book')->get();
        return view('loans.loans', compact('loans'));
    }*/
    public function index()
    {
        $loans = Loan::with(['user', 'book'])->where('state', 'activo')->get();
        return view('loans.loans', compact('loans'));
    }

    public function returns()
    {
        $loans = Loan::with(['user', 'book'])->where('state', 'inactivo')->get();
        return view('loans.returns', compact('loans'));
    }
    
    /*public function returns()
    {
        $loans = Loan::with('user', 'book')->get();
        return view('loans.returns', compact('loans'));
    }*/


    public function create()
    {
        $users = User::all();
        $books = Book::all();
        $currentDate = Carbon::now()->format('Y-m-d'); // Obtener la fecha actual en formato 'Y-m-d'
        $endDate = Carbon::now()->addDays(7)->format('Y-m-d'); // Sumar 7 días a la fecha actual

        return view('loans.create', compact('users', 'books', 'currentDate', 'endDate'));
    }
    
    /*public function store(Request $request)
    {
            // Validar los datos del préstamo
            $data = $request->validate([
                'user_id' => 'required|exists:users,id', // Usuario requerido y debe existir en la tabla de usuarios
                'book_id' => 'required|exists:books,id', // Libro requerido y debe existir en la tabla de libros
                'start_date' => 'required|date', // Fecha de inicio requerida, tipo fecha
                'end_date' => 'required|date|after:start_date', // Fecha de fin requerida, tipo fecha y debe ser posterior a la fecha de inicio
                
            ]);

            // Crear un nuevo préstamo
            $newLoan = Loan::create($data);

            return redirect("loans");
    }*/
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ], [
            'user_id.required' => 'El campo usuario es obligatorio.',
            'book_id.required' => 'El campo libro es obligatorio.',
            'end_date.after' => 'La fecha de fin debe ser posterior a la fecha de inicio.',
        ]);
        

        // Validar si hay stock del libro
        $book = Book::find($data['book_id']);
        if ($book->quantity <= 0) {
            return redirect()->back()->withErrors(['book_id' => 'El libro no está disponible en este momento.']);
        }

        // Crear el préstamo
        Loan::create($data);

        // Reducir la cantidad del libro
        $book->decrement('quantity');

        return redirect("loans")->with('success', 'Préstamo registrado exitosamente.');
    }


    // app/Http/Controllers/LoanController.php
    /*public function deactivate(Loan $loan)
    {
        // Cambiar el estado del préstamo
        $loan->state = 'inactivo'; // O el estado que desees asignar
        $loan->save();

        return redirect()->back()->with('success', 'El préstamo ha sido dado de baja.');
    }*/
    public function deactivate(Loan $loan)
    {
        $loan->state = 'inactivo';
        $loan->save();

        // Restaurar la cantidad del libro si existe
        if ($loan->book) {
            $loan->book->increment('quantity');
        }

        return redirect()->back()->with('success', 'El préstamo ha sido dado de baja.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        //
    }
    /*public function destroy(Loan $loan)
    {
        if ($loan->state == 'activo' && $loan->book) {
            $loan->book->increment('quantity');
        }

        $loan->delete();

        return redirect()->back()->with('success', 'El préstamo ha sido eliminado.');
    }
*/ 
}
