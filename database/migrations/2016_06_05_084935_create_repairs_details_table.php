<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('file_id')->unsigned()->index();
            $table->integer('article_id')->unsigned()->index();
            $table->float('price');
            $table->integer('quantity');
            $table->timestamps();


            $table->foreign('file_id')
                ->references('file_id')
                ->on('orders')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('article_id')
                ->references('id')
                ->on('articles')
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
        Schema::drop('repairs_details');
    }
}
