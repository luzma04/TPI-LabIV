<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

class LoanController extends Controller
{

    public function index()
    {
        $loans = Loan::with('user', 'book')->get();
        return view('loans.loans', compact('loans'));
    }


    public function create()
    {
        $users = User::all();
        $books = Book::all();
        return view('loans.create', compact('users', 'books'));
    }
    public function store(Request $request)
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
}
