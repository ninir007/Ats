<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodesStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codes_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label', 10);
            $table->integer('group_status_id')->unsigned();
            $table->enum('step', ['debut', 'devis', 'commande', 'prefinale','finale']);
            $table->enum('step_step', ['in', 'out', 'in and out', 'middle']);
            $table->string('description', 50);


            $table->foreign('group_status_id')
                ->references('id')
                ->on('groups_status')
                ->onDelete('cascade')
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
        Schema::drop('codes_status');
    }
}
