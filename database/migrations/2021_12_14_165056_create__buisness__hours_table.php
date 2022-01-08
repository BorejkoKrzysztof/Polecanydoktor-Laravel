<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuisnessHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buisness_hours', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('Doctor_id')->unsigned();
            $table->foreign('Doctor_id')->references('Id')->on('doctors')->onDelete('cascade');
            $table->integer('Day')->nullable()->default(false);
            $table->time('Open_time')->format('H:i');
            $table->time('Close_time')->format('H:i');
        });
    }

    /**
     * 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_buisness__hours');
    }
}
