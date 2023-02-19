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
        Schema::create('sponsors_courses', function (Blueprint $table) {
            $table->unsignedBigInteger('sponsor_id');
            $table->unsignedBigInteger('course_id');

            $table->foreign('sponsor_id')->references('id')->on('sponsors')->onDelete('restrict');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('restrict');
        });


        //create test sponsor
        $sponsor = new \App\Models\Sponsor();
        $sponsor->name = 'Patrocinador de prova';
        $sponsor->cif = '12345678A';
        $sponsor->address = 'Adreça de patrocinador de prova';
        $sponsor->is_active = true;
        $sponsor->main_plane = true;
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
        Schema::dropIfExists('sponsors_courses');
    }
};
