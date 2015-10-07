<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repair_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('device_id')->unsigned();
            $table->integer('file_id')->unsigned();
            $table->boolean('accessory');
            $table->timestamps();


            $table->foreign('device_id')
                ->references('id')
                ->on('devices')
                ->onUpdate('cascade');
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
        Schema::drop('repair_files');
    }
}
