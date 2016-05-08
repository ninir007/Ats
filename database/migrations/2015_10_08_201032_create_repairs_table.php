<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->integer('file_id')->unsigned();
            $table->integer('device_id')->unsigned();
            $table->boolean('accessory');
            $table->timestamps();


            $table->foreign('device_id')
                ->references('id')
                ->on('devices')
                ->onUpdate('cascade');

            $table->primary('file_id');

            $table->foreign('file_id')
                ->references('id')
                ->on('files')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('repairs');
    }
}
