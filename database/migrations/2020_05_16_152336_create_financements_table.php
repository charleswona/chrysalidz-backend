<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('membre_id');
            $table->bigInteger('campagne_finance_id');
            $table->double('montant', 15, 8);
            $table->foreign('membre_id')->references('id')->on('membres')->onDelete('cascade');
            $table->foreign('campagne_finance_id')->references('id')->on('campagne_financements')->onDelete('cascade');
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
        Schema::dropIfExists('financements');
    }
}
