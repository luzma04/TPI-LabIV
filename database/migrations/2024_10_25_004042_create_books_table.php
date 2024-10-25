<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->increments('id');  // Llave primaria autoincremental
        $table->unsignedInteger('id_category');  // Llave foránea que hace referencia a la tabla 'categories'
        $table->text('description');  // Descripción del libro
        $table->bigInteger('ISBN_code');  // Código ISBN del libro (se usa bigInteger para manejar ISBN de 13 dígitos)
        $table->integer('quantity');  // Cantidad disponible del libro
        $table->string('state');  // Estado del libro (ej. 'disponible', 'prestado')
        $table->string('title');  // Título del libro
        $table->year('publication_year');  // Año de publicación del libro
        $table->string('language');  // Idioma del libro
        $table->string('theme');  // Tema del libro
        $table->string('genre');  // Género del libro
        $table->timestamps();  // Para los campos created_at y updated_at

        // Establecer clave foránea con la tabla 'categories'
        $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
