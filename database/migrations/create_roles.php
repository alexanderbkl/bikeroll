<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    /*  $role1 = Role::firstOrCreate(['name' => 'admin']);
       // $role2 = Role::create(['name' => 'pro']);
        $user = User::find(1);
        $user->assignRole($role1);
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
};
