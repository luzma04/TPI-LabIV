<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('books.books', ['books'=>$books]);
    }
    public function create(){
        return view('books.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|string|max:255', // Título requerido, tipo string y longitud máxima de 100 caracteres
            'author' => 'required|string|max:255', // Autor requerido, tipo string y longitud máxima de 100 caracteres
            'category' => 'required|string|in:novela,cuento,academico', // Categoría requerida, debe estar entre las opciones definidas
            'description' => 'required|string|max:1000', // Descripción opcional, tipo string y longitud máxima de 1000 caracteres
            'ISBN_code' => 'required|string|size:13', // ISBN requerido, longitud de 13 caracteres
            'publication_year' => 'required|date', // Año de publicación requerido, tipo fecha
            'language' => 'required|string|in:spanish,english,german', // Idioma requerido, debe estar entre las opciones definidas
            'quantity' => 'required|integer|min:1', // Cantidad requerida, debe ser un número entero mayor o igual a 1
        ]);

        $newBook = Book::create($data);
        return redirect("books");
    }

    public function edit(Book $book){
        return view('books.edit', ['book'=>$book]);
    }

    public function update(Book $book, Request $request){
        $data = $request->validate([
            'title' => 'required|string|max:255', // Título requerido, tipo string y longitud máxima de 100 caracteres
            'author' => 'required|string|max:255', // Autor requerido, tipo string y longitud máxima de 100 caracteres
            'category' => 'required|string|in:novela,cuento,academico', // Categoría requerida, debe estar entre las opciones definidas
            'description' => 'required|string|max:1000', // Descripción opcional, tipo string y longitud máxima de 1000 caracteres
            'ISBN_code' => 'required|string|size:13', // ISBN requerido, longitud de 13 caracteres
            'publication_year' => 'required|date', // Año de publicación requerido, tipo fecha
            'language' => 'required|string|in:spanish,english,german', // Idioma requerido, debe estar entre las opciones definidas
            'quantity' => 'required|integer|min:1', // Cantidad requerida, debe ser un número entero mayor o igual a 1
        ]);
        $book->update($data);
        return redirect("books");
    }

    public function delete(Book $book){
        $book->delete();
        return redirect("books");
    }
}
