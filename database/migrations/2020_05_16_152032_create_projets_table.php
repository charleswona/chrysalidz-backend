<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('categorie_projet_id')->nullable()->default(12);
            $table->string('denomination', 100);
            $table->string('description', 255);
            $table->double('montant_projet', 15, 8)->nullable();
            $table->boolean('publié')->nullable()->default(false);
            $table->double('note_eligibilité', 15, 8)->nullable();
            $table->foreign('categorie_projet_id')->references('id')->on('categorie_projets')->onDelete('cascade');
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
        Schema::dropIfExists('projets');
    }
}
