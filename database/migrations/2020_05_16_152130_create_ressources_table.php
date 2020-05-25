<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRessourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ressources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('projet_id');
            $table->bigInteger('type_ressource_id');
            $table->string('denomination', 100);
            $table->string('path', 100);
            $table->string('visibilité', 100)->nullable();
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');
            $table->foreign('type_ressource_id')->references('id')->on('type_ressources')->onDelete('cascade');
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
        Schema::dropIfExists('ressources');
    }
}
