<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){
    Schema::create('authors', function (Blueprint $table) {
        $table->increments('id');  // Llave primaria autoincremental
        $table->unsignedInteger('id_people');  // Llave foránea que hace referencia a la tabla 'person'
        $table->string('nickname');  // Apodo del autor
        $table->timestamps();  // Para los campos created_at y updated_at

        // Establecer clave foránea con la tabla 'person'
        $table->foreign('id_people')->references('id')->on('people')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
