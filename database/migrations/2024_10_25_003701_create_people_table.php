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
    Schema::create('people', function (Blueprint $table) {
        $table->increments('id');  // Llave primaria autoincremental
        $table->unsignedInteger('id_adress');  // Llave foránea (asumo que hay otra tabla 'address')
        $table->string('name');  // Nombre de la persona
        $table->string('document_number');  // Número de documento
        $table->integer('age');  // Edad
        $table->string('person_type');  // Tipo de persona
        $table->timestamps();  // Para los campos created_at y updated_at

        // Si necesitas relacionar esta tabla con 'address', podrías agregar una clave foránea
        $table->foreign('id_adress')->references('id')->on('addresses');  // Asegúrate de que la tabla 'address' tenga una columna 'id'
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
