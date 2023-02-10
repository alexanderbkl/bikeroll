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
            $table->string('name');
            $table->string('cif')->unique();
            $table->string('logo')->nullable();
            $table->string('address');
            $table->boolean('is_active')->default(false);
            $table->integer('total_price')->nullable();
            $table->timestamps();
        });


        //create test sponsor
        $sponsor = new \App\Models\Sponsor();
        $sponsor->name = 'Patrocinador de prova';
        $sponsor->cif = '12345678A';
        $sponsor->address = 'Adreça de patrocinador de prova';
        $sponsor->is_active = true;
        $sponsor->save();

        $courses = \App\Models\Course::all();

        $sponsor->courses()->attach($courses);

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
