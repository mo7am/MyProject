<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guists', function (Blueprint $table) {
            $table->id();
            $table->dateTime('checkindate');
            $table->dateTime('checkoutdate');
            $table->string('city');
            $table->string('nationality');
           /* $table->integer('roomtype_id')->unsigned();
            $table->integer('TypeOfRoomTypeID')->unsigned();
            $table->integer('user_id')->unsigned();*/
            $table->integer('roomtype_id');
            $table->integer('TypeOfRoomTypeID');
            $table->integer('user_id');
            $table->timestamps();
        });

         /*Schema::table('guists', function($table) {
         $table->foreign('roomtype_id')->references('Id')->on('roomtypes');
         $table->foreign('TypeOfRoomTypeID')->references('Id')->on('typeofroomtypes');
         $table->foreign('user_id')->references('Id')->on('users');
   });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guists');
    }
}
