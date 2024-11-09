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

        // Generar un ISBN aleatorio
        $isbn = $this->generateISBN13();
        $title = $this->generateBookTitle();
        $author = $this->generateAuthorName();
        $description = $this->generateDescription();
        $publication_year = $this->generatePublicationsYears();
        $category = $this->getRandomCategory();
        $language = $this ->getRandomLanguage();
        $quantity = $this->getRandomQuantity();

        return view('books.create', compact('isbn', 'title', 'author', 'description','publication_year', 'category', 'language', 'quantity'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|string|max:255', // Título requerido, tipo string y longitud máxima de 100 caracteres
            'author' => 'required|string|max:255', // Autor requerido, tipo string y longitud máxima de 100 caracteres
            'category' => 'required|string|in:novela,cuento,academico', // Categoría requerida, debe estar entre las opciones definidas
            'description' => 'required|string|max:1000', // Descripción opcional, tipo string y longitud máxima de 1000 caracteres
            'ISBN_code' => 'required|string|size:13', // ISBN requerido, longitud de 13 caracteres
            'publication_year' => 'required|date', // Año de publicación requerido, tipo fecha
            'language' => 'required|string|in:espanol,ingles,aleman', // Idioma requerido, debe estar entre las opciones definidas
            'quantity' => 'required|integer|min:1', // Cantidad requerida, debe ser un número entero mayor o igual a 1
        ]);

        // Verificar si el ISBN ya existe en la base de datos
        $existingBook = Book::where('ISBN_code', $data['ISBN_code'])->first();

        if ($existingBook) {
            // Si el ISBN ya existe, retornar un error
            return redirect()->back()->withErrors(['ISBN_code' => 'El código ISBN ya está registrado.'])->withInput();
        }

        // Si el ISBN no existe, crear el nuevo libro
        $newBook = Book::create($data);

        return redirect("books")->with('success', 'Libro creado exitosamente.');
    }




    public function edit(Book $book){
        return view('books.edit', ['book'=>$book]);
    }

    public function details(Book $book){
        return view('books.details', ['book'=>$book]);
    }


    public function update(Book $book, Request $request){
        $data = $request->validate([
            'title' => 'required|string|max:255', // Título requerido, tipo string y longitud máxima de 100 caracteres
            'author' => 'required|string|max:255', // Autor requerido, tipo string y longitud máxima de 100 caracteres
            'category' => 'required|string|in:novela,cuento,academico', // Categoría requerida, debe estar entre las opciones definidas
            'description' => 'required|string|max:1000', // Descripción opcional, tipo string y longitud máxima de 1000 caracteres
            'ISBN_code' => 'required|string|size:13', // ISBN requerido, longitud de 13 caracteres
            'publication_year' => 'required|date', // Año de publicación requerido, tipo fecha
            'language' => 'required|string|in:espanol,ingles,aleman', // Idioma requerido, debe estar entre las opciones definidas
            'quantity' => 'required|integer|min:1', // Cantidad requerida, debe ser un número entero mayor o igual a 1
        ]);
        $book->update($data);
        return redirect("books");
    }

    public function delete(Book $book){
        $book->delete();
        return redirect("books");
    }

    // Función para generar el ISBN-13
    private function generateISBN13()
    {
        // Prefijo estándar 978 o 979
        $isbn = '978';

        // Generar los siguientes 9 dígitos aleatorios
        for ($i = 0; $i < 9; $i++) {
            $isbn .= mt_rand(0, 9);
        }

        // Calcular el dígito de control usando el método ISBN-13
        $checkDigit = 0;
        for ($i = 0; $i < 12; $i++) {
            $checkDigit += ($i % 2 === 0 ? 1 : 3) * $isbn[$i];
        }
        $checkDigit = (10 - ($checkDigit % 10)) % 10;

        // Añadir el dígito de control al ISBN
        $isbn .= $checkDigit;

        return $isbn;
    }

    private function generateBookTitle()
    {
        // Lista de 20 posibles títulos
        $titles = [
            'El océano silencioso', 
            'Viaje a lo desconocido', 
            'Susurros del pasado', 
            'Sombras de la mente', 
            'Ecos de la eternidad', 
            'Bajo las estrellas', 
            'Vientos de cambio', 
            'El reino perdido', 
            'Reflexiones de un sueño', 
            'Secretos en la noche', 
            'Más allá del horizonte', 
            'El camino olvidado', 
            'Voces en la niebla', 
            'En el corazón del bosque', 
            'Un cuento de dos mundos', 
            'Leyendas de lo antiguo', 
            'Recuerdos del mañana', 
            'El capítulo final', 
            'El auge del fénix', 
            'La última frontera'
        ];
        

        // Selecciona aleatoriamente un título de la lista
        return $titles[array_rand($titles)];
    }
    private function generateAuthorName()
    {
        // Lista de 20 posibles nombres de autores
        $authors = [
            'Gabriel García Márquez', 'Isabel Allende', 'Haruki Murakami', 
            'George Orwell', 'Jane Austen', 'J.K. Rowling', 
            'Agatha Christie', 'J.R.R. Tolkien', 'Stephen King', 
            'Ernest Hemingway', 'F. Scott Fitzgerald', 'Oscar Wilde', 
            'Virginia Woolf', 'Charles Dickens', 'Mark Twain', 
            'Leo Tolstoy', 'Franz Kafka', 'Victor Hugo', 
            'Arthur Conan Doyle', 'Miguel de Cervantes'
        ];

        // Selecciona aleatoriamente un nombre de autor de la lista
        return $authors[array_rand($authors)];
    }

    private function generateDescription()
    {
        // Lista de descripciones posibles (máximo de 1000 caracteres cada una)
        $descriptions = [
            "Una historia emocionante llena de aventuras y descubrimientos.",
            "Un relato conmovedor sobre la amistad, el amor y el sacrificio.",
            "Este libro explora temas de justicia, moralidad y la naturaleza humana.",
            "Una obra fascinante que te mantendrá enganchado desde el principio hasta el final.",
            "Una guía esencial para cualquiera que desee mejorar sus habilidades de liderazgo.",
            "Una novela que ofrece una mirada única al poder de los recuerdos y la memoria.",
            "Un análisis profundo de los desafíos y las oportunidades en el mundo moderno.",
            "Este libro es una ventana al pasado, llena de detalles históricos sorprendentes.",
            "Un estudio sobre la resiliencia humana y la capacidad de superar las adversidades.",
            "Un relato de superación personal que inspira y motiva a los lectores.",
            "Una comedia ingeniosa y divertida que aborda la vida cotidiana con humor.",
            "Este libro ofrece una perspectiva fresca sobre la importancia de la empatía.",
            "Una exploración de los desafíos emocionales y psicológicos en las relaciones.",
            "Una novela histórica que captura la esencia de una época pasada.",
            "Una colección de relatos cortos llenos de imaginación y creatividad.",
            "Una guía práctica para el desarrollo personal y la autoayuda.",
            "Un análisis científico y filosófico de la naturaleza humana.",
            "Una biografía inspiradora de una figura histórica influyente.",
            "Un libro de misterio que mantendrá a los lectores adivinando hasta el final.",
            "Una obra poética y reflexiva sobre la búsqueda de la identidad personal."
        ];

        // Selecciona una descripción aleatoria de la lista
        return $descriptions[array_rand($descriptions)];
    }
    private function generatePublicationsYears()
    {
        // Lista de 20 posibles nombres de autores
        $publications_years = [
            '2000-10-10', '2001-11-15', '2010-10-15', '2020-02-20', '2003-10-13',
            '1999-07-09', '2011-03-25', '2007-12-05', '2022-01-14', '2008-06-18',
            '2004-04-22', '2015-05-20', '2002-08-16', '2009-09-09', '2021-03-11',
            '2017-07-29', '2018-10-30', '2005-01-28', '2012-11-13', '2016-02-27'
        ];

        // Selecciona aleatoriamente un nombre de autor de la lista
        return $publications_years[array_rand($publications_years)];
    }

    // Function to get a random category
    private function getRandomCategory() {
        $categories = ['novela', 'cuento', 'academico'];
        return $categories[array_rand($categories)];
    }

    // Function to get a random quantity between 1 and 999
    private function getRandomQuantity() {
        return rand(1, 10);
    }

    // Function to get a random language
    private function getRandomLanguage() {
        $languages = ['espanol', 'ingles', 'aleman'];
        return $languages[array_rand($languages)];
    }

    
}
