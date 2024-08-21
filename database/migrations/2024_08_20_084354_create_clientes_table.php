<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();       //Campo ID de nuestro cliente
            $table->string('nombre');   //Campo nombre
            $table->string('apellido'); //Campo apellido
            $table->date('fech_nacimiento'); //campo de nacimiento
            $table->string('correo')->unique(); //Campo de correo que sea único
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
