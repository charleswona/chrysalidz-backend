<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampagneFinancementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campagne_financements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('projet_id');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->double('montant_cible', 15, 8);
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campagne_financements');
    }
}
