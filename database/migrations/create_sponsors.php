<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();
            // Afegir, editar i desactivar sponsors. Dels sponsors volem saber el seu, nom, el
            // seu CIF, logo, adreça i les curses que patrocinen i si volen sortir a la plana
            // principal. Evidentment això últim també tindrà un cost. Es generarà una factura
            // amb PDF amb es dades de l’empresa i l’import total calculat segons el número
            // de curses que patrocinin.
            $table->string('name');
            $table->string('cif')->unique();
            $table->string('logo');
            $table->string('address');
            $table->boolean('is_active')->default(false);
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsors');
    }
};
