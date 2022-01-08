<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalSpecialityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_speciality', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('Doctor_id')->unsigned();
            $table->foreign('Doctor_id')->references('Id')->on('doctors')->onDelete('cascade');
            $table->integer('Medical_Speciality_id')->unsigned();
            $table->foreign('Medical_Speciality_id')->references('Id')->on('medical_Speciality')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_medical__speciality');
    }
}
