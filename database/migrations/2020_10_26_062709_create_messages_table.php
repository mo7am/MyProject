<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->longtext('content');
           /* $table->integer('sender_id')->unsigned();
            $table->integer('receiver_id')->unsigned();
            
            $table->integer('state_id')->unsigned();*/

            $table->integer('sender_id');
            $table->integer('receiver_id');
           
            $table->integer('state_id');
            $table->dateTime('time');
            $table->timestamps();
        });

         /*Schema::table('messages', function($table) {
         $table->foreign('sender_id')->references('Id')->on('users');
         $table->foreign('receiver_id')->references('Id')->on('users');
         $table->foreign('state_id')->references('Id')->on('states');
   });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
