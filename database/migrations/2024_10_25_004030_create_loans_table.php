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
    Schema::create('loans', function (Blueprint $table) {
        $table->increments('id');  // Llave primaria autoincremental
        $table->unsignedInteger('id_book');  // Llave foránea que hace referencia a la tabla 'books'
        $table->date('start_date');  // Fecha de inicio del préstamo
        $table->date('end_date');  // Fecha de finalización del préstamo
        $table->string('state');  // Estado del préstamo (ej. 'pendiente', 'devuelto')
        $table->timestamps();  // Para los campos created_at y updated_at

        // Establecer clave foránea con la tabla 'books'
        $table->foreign('id_book')->references('id')->on('books')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
