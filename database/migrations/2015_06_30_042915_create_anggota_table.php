<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->integer('age');
            $table->string('job');
            $table->string('city');
            $table->string('province');
            $table->longText('address');
            $table->string('mobilePhone');
            $table->boolean('banned')->default(0);
            $table->integer('user_id');
            $table->rememberToken();
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
        Schema::drop('anggota');
    }
}
