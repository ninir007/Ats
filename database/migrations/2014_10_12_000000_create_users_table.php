<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        //create the admin
        // Insert some stuff
        DB::table('users')->insert([
            ['name' => 'admin'],
            ['email' => 'admin@ats.com'],
            ['password' => '084089'],
            ['is_admin' => 1],
            ['created_at' => '2016-05-14 02:01:47'],
            ['updated_at' => '2016-06-26 10:31:49'],
            ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
