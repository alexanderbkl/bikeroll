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

            $table->string('title');
            $table->string('url')->unique();
            $table->text('description');
            $table->integer('elevation');
            $table->string('map_image')->nullable();
            $table->string('poster_image')->nullable();
            $table->integer('max_participants');
            $table->integer('km');
            $table->dateTime('date');
            $table->string('start_point');
            $table->string('poster')->nullable();
            $table->integer('sponsorship_price');
            $table->string('images')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });

        //create test course
        $course = new \App\Models\Course();
        $course->title = 'Cursa de prova';
        $course->url = 'cursa-de-prova';
        $course->description = 'Descripció de cursa de prova';
        $course->elevation = 100;
        $course->max_participants = 50;
        $course->km = 10;
        $course->date = '2023-02-26 15:00:00';
        $course->start_point = 'Punt de partida';
        $course->sponsorship_price = 150;
        $course->is_active = true;
        $course->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop if exists courses_users
        Schema::dropIfExists('courses_users');
        Schema::dropIfExists('courses');
    }
};