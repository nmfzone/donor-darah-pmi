<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminDaerahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminDaerah', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('city');
            $table->integer('user_id');
            $table->integer('adminPusat_id')->unsigned()->nullable();
            $table->foreign('adminPusat_id')->references('id')->on('adminPusat')->onDelete('set null');
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
        Schema::drop('adminDaerah');
    }
}
