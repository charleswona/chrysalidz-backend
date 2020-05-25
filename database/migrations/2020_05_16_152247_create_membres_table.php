<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('civilite', 100);
            $table->string('noms', 100);
            $table->string('prenoms', 100)->nullable();
            $table->string('code_postal', 100)->nullable();
            $table->string('telephone', 100);
            $table->string('denomination_social', 100)->nullable();
            $table->string('structure_juridique', 100)->nullable();
            $table->double('valorisation_entreprise', 15, 8)->nullable();
            $table->double('capital_social', 15, 8)->nullable();
            $table->integer('nombre_action')->unsigned()->nullable();
            $table->string('registre_commerce', 255)->nullable();
            $table->string('activite', 255)->nullable();
            $table->string('site_internet', 100)->nullable();
            $table->string('adresse_fiscale', 255)->nullable();
            $table->string('code_postal_siege', 100)->nullable();
            $table->string('ville', 100);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('membres');
    }
}
