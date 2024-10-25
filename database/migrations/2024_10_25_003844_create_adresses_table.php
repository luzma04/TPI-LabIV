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
    Schema::create('adresses', function (Blueprint $table) {
        $table->increments('id');  // Llave primaria autoincremental
        $table->integer('house_number');  // Número de casa
        $table->string('street');  // Calle
        $table->string('locality');  // Localidad
        $table->string('province');  // Provincia
        $table->timestamps();  // Para los campos created_at y updated_at
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresses');
    }
};
