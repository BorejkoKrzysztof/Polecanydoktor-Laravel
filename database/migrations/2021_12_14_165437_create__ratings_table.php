<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('User_id')->unsigned();
            $table->foreign('User_id')->references('Id')->on('users')->onDelete('cascade');
            $table->integer('Doctor_id')->unsigned();
            $table->foreign('Doctor_id')->references('Id')->on('doctors')->onDelete('cascade');
            $table->string('Comment')->nullable()->default(false);
            $table->integer('Rating')->nullable()->default(null);
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
        Schema::dropIfExists('_ratings');
    }
}
