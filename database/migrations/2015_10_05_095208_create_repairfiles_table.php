<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairfilesTable extends Migration
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
            $table->integer('client_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->mediumText('intern_report');
            $table->mediumText('client_report');
            $table->boolean('accessory');
            $table->integer('labor_amount');
            $table->integer('part_amount');
            $table->integer('sum_amount');
            $table->timestamps();


            $table->foreign('device_id')
                ->references('id')
                ->on('devices')
                ->onUpdate('cascade');
            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onUpdate('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
