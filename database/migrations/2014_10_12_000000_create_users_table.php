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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        //create a user for testing
        $admin = new \App\Models\User();
        $admin->name = 'Admin';
        $admin->email = 'admin@mail.com';
        $admin->password = '$2y$10$E/CitXCI1W1Rrh7K8YGSzOQ1G4edUv2kr1g/r//xtuciuy5q7FJ26';
        $admin->save();
        $admin->assignRole('admin');

        $user = new \App\Models\User();
        $user->name = 'User';
        $user->email = 'user@mail.com';
        $user->password = '$2y$10$mAt7.zKMATgn1i/dhMhWo.vYdi8lI2b4GxoSRa8/3JJIlUm7OdMOq';
        $user->save();

        $user = new \App\Models\User();
        $user->name = 'Pro user';
        $user->email = 'pro@mail.com';
        $user->password = '$2y$10$mAt7.zKMATgn1i/dhMhWo.vYdi8lI2b4GxoSRa8/3JJIlUm7OdMOq';
        $user->save();
        $user->assignRole('pro');




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};