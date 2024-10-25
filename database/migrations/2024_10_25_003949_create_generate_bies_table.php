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
    Schema::create('generate_bies', function (Blueprint $table) {
        $table->increments('id');  // Llave primaria autoincremental
        $table->unsignedInteger('id_user');  // Llave foránea que hace referencia a la tabla 'users'
        $table->unsignedInteger('id_loan');  // Llave foránea que hace referencia a la tabla 'loans'
        $table->timestamps();  // Para los campos created_at y updated_at

        // Establecer clave foránea con la tabla 'users'
        $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        
        // Establecer clave foránea con la tabla 'loans'
        $table->foreign('id_loan')->references('id')->on('loans')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generate_bies');
    }
};
