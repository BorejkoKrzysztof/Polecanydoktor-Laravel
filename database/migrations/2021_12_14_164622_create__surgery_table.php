<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurgeryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgery', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('Doctor_id')->unsigned();
            $table->foreign('Doctor_id')->references('Id')->on('doctors')->onDelete('cascade');
            $table->string('Institution_name')->nullable()->default(null);
            $table->string('Street')->nullable()->default(null);
            $table->string('Building_number')->nullable()->default(null);
            $table->string('City')->nullable()->default(null);
            $table->string('Postal_code')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_surgery');
    }
}
