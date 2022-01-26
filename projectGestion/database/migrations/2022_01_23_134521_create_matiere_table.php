<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatiereTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matiere', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_Matiere');
            $table->string('nom_Section'); 
            $table->string('nom_Classe'); 
            $table->string('prof_Matiere'); 
            $table->string('surveillant1'); 
            $table->string('surveillant2'); 
            $table->string('classe'); 
            $table->string('heure'); 
            $table->string('date'); 
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
        Schema::dropIfExists('matiere');
    }
}
