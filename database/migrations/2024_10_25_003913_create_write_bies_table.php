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
    Schema::create('write_bies', function (Blueprint $table) {
        $table->increments('id');  // Llave primaria autoincremental
        $table->unsignedInteger('id_author');  // Llave foránea que hace referencia a la tabla 'authors'
        $table->unsignedInteger('id_user');  // Llave foránea que hace referencia a la tabla 'users' (o una tabla relacionada con los usuarios)
        $table->timestamps();  // Para los campos created_at y updated_at

        // Establecer clave foránea con la tabla 'authors'
        $table->foreign('id_author')->references('id')->on('authors')->onDelete('cascade');
        
        // Establecer clave foránea con la tabla 'users' (o una tabla relacionada con usuarios)
        $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('write_bies');
    }
};
