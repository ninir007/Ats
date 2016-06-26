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
            $table->enum('step', ['IN', 'OUT', 'IN AND OUT', 'MIDDLE']);
            $table->string('description', 50);


            $table->foreign('group_status_id')
                ->references('id')
                ->on('groups_status')
                ->onUpdate('cascade');
        });

        // Insert BAsic Codes
        DB::table('codes_status')->insert([
            ['label' => 'I/A', 'group_status_id' => 1, 'step' => 'IN AND OUT', 'description' => 'entré'],
            ['label' => 'TW', 'group_status_id' => 3, 'step' => 'IN', 'description' => 'à commander'],
            ['label' => 'TWP', 'group_status_id' => 3, 'step' => 'MIDDLE', 'description' => 'commandé'],
            ['label' => 'TY', 'group_status_id' => 3, 'step' => 'OUT', 'description' => 'commande reçu'],
            ['label' => 'EC', 'group_status_id' => 2, 'step' => 'IN AND OUT', 'description' => 'en cours de réparation'],
            ['label' => 'TR', 'group_status_id' => 4, 'step' => 'IN', 'description' => 'terminé'],
            ['label' => 'PE', 'group_status_id' => 4, 'step' => 'MIDDLE', 'description' => 'prix etablie'],
            ['label' => 'AV', 'group_status_id' => 4, 'step' => 'OUT', 'description' => 'client avisé'],
            ['label' => 'AB', 'group_status_id' => 9, 'step' => 'IN AND OUT', 'description' => 'abandonné'],
            ['label' => 'FE', 'group_status_id' => 5, 'step' => 'IN AND OUT', 'description' => 'facture etablie'],
            ['label' => 'EI', 'group_status_id' => 8, 'step' => 'IN AND OUT', 'description' => 'économiquement irréparable'],
            ['label' => 'TDD', 'group_status_id' => 6, 'step' => 'IN', 'description' => 'technicien devis'],
            ['label' => 'PED', 'group_status_id' => 6, 'step' => 'MIDDLE', 'description' => 'prix etablie devis'],
            ['label' => 'TDE', 'group_status_id' => 6, 'step' => 'OUT', 'description' => 'devis ecrit'],
            ['label' => 'TDF', 'group_status_id' => 6, 'step' => 'OUT', 'description' => 'devis fax'],
            ['label' => 'TDT', 'group_status_id' => 6, 'step' => 'OUT', 'description' => 'devis telephone'],
            ['label' => 'TDM', 'group_status_id' => 6, 'step' => 'OUT', 'description' => 'devis mail'],
            ['label' => 'TDY', 'group_status_id' => 7, 'step' => 'IN AND OUT', 'description' => 'devis accepté'],
            ['label' => 'TDN', 'group_status_id' => 7, 'step' => 'IN AND OUT', 'description' => 'devis refusé'],
            ['label' => 'OUT', 'group_status_id' => 9, 'step' => 'IN AND OUT', 'description' => 'appareil/commande sorti']
        ]);
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
