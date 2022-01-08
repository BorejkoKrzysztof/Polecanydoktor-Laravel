<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Email', 30);
            $table->string('Password');
            $table->string('First_name')->nullable()->default(null);
            $table->string('Last_name')->nullable()->default(null);
            $table->integer('Sex')->nullable()->default(null);
            $table->date('Birthday')->nullable()->default(null);
            $table->integer('Role_id')->unsigned();
            $table->foreign('Role_id')->references('Id')->on('roles')->onDelete('cascade');
            // $table->string('References_adress');
            $table->string('Image_path')->nullable();
            $table->boolean('updated_info')->default(false);
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
        Schema::dropIfExists('_users');
    }
}
