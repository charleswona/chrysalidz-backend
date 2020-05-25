<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoumissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soumissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('membre_id')->nullable();
            $table->bigInteger('projet_id')->nullable();
            $table->foreign('membre_id')->references('id')->on('membres')->onDelete('cascade');
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
        Schema::dropIfExists('soumissions');
    }
}
