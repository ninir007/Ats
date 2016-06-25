<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the table
        Schema::create('groups_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label', 30);
        });

        // Insert some stuff
        DB::table('groups_status')->insert([
            ['label' => 'pre'],
            ['label' => 'rep'],
            ['label' => 'comm'],
            ['label' => 'post'],
            ['label' => 'opt'],
            ['label' => 'devis'],
            ['label' => 'devis-end'],
            ['label' => 'econo']

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('groups_status');
    }
}
