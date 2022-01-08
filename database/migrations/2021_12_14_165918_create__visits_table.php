<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('User_id')->unsigned();
            $table->foreign('User_id')->references('Id')->on('users')->onDelete('cascade');
            $table->integer('Doctor_id')->unsigned();
            $table->foreign('Doctor_id')->references('Id')->on('doctors')->onDelete('cascade');
            $table->boolean('Rated')->nullable()->defalt(false);
            $table->time('Visit_time')->format('H:i');
            $table->date('Visit_date');
            $table->datetime('updated_at');
            $table->datetime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_visits');
    }
}
