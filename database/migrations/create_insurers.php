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
        Schema::create('insurers', function (Blueprint $table) {
            $table->id();
            $table->string('cif')->unique;
            $table->string('name');
            $table->string('address');
            $table->integer('price');
            $table->timestamps();
        });

        //create test insurer
        $insurer = new \App\Models\Insurer();
        $insurer->cif = '12345678A';
        $insurer->name = 'Aseguradora de prueba';
        $insurer->address = 'Dirección de aseguradora de prueba';
        $insurer->price = 150;
        $insurer->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurers');
    }
};
