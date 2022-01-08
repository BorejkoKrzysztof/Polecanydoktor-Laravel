<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('User_id')->unsigned()->nullable();
            // $table->integer('User_id')->nullable();
            $table->foreign('User_id')->references('Id')->on('users')->onDelete('cascade');
            $table->decimal('Price_hour', 8, 2);
            $table->boolean('NFZ_collaborations')->nullable()->default(false);
            $table->string('Description')->nullable()->default(null);
            // $table->string('Rating_value')->nullable()->default(null);
            // $table->integer('Amount_ratings')->nullable()->default(0);
            $table->integer('Amount_ratings')->default(0);
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
        Schema::dropIfExists('_doctors');
    }
}
