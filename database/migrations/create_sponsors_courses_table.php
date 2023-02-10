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
