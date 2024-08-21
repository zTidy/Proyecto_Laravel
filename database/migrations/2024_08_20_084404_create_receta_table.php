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
        Schema::create('receta', function (Blueprint $table) {
            $table->id();               //campo ID
            $table->string('receta');   //campo Receta
            $table->unsignedBigInteger('cliente_id');   //Campo cliente id (llave foranea)

            //campo que hace referencia a nuestra llave foranea y se asigna como método de cascada
            //el método de "Cascada" nos ayuda cuando se elimina el cliente que hace referencia a ese ID...
            //tambien se elimina su receta en nuestra tabla de Receta.
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receta');
    }
};
