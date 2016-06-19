<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->enum('type', ['REPAIR', 'ORDER']);

            $table->text('intern_report');
            $table->text('client_report');

            $table->float('labor_amount');
            $table->float('part_amount');
            $table->float('sum_amount');
            $table->float('shifting_amount');
            $table->float('advance_amount');


            $table->decimal('shifting_vat', 5, 2)->default(21);
            $table->decimal('part_vat', 5, 2)->default(21);
            $table->decimal('labor_vat', 5, 2)->default(21);

            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
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
        Schema::drop('files');

    }
}
