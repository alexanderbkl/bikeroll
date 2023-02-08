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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            /* De les curses volem saber la seva descripció,
desnivell, imatge del mapa, número de participants màxim, km, data y hora de la
seva celebració, punt de sortida, cartell de promoció i diners que val patrocinar-
la. A més de totes les fotografies que es fan.*/

            $table->string('title');
            $table->string('url')->unique();
            $table->text('description');
            $table->integer('elevation');
            $table->string('map_image')->nullable();
            $table->integer('max_participants');
            $table->integer('km');
            $table->dateTime('date');
            $table->string('start_point');
            $table->string('poster_url');
            $table->integer('sponsorship_price');
            $table->string('photos_id');
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('courses');
    }
};
