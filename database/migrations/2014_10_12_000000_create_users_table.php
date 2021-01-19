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
            $table->id();
            $table->string('fname')->default('ahmed');
            $table->string('mname')->default('ahmed');
            $table->string('lname')->default('ahmed');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->float('balance')->default('50000');
           // $table->integer('type_id')->unsigned();
           $table->integer('type_id')->default('4');
           $table->integer('stateBlock')->default('6');
            $table->string('image')->default('img-1.jpg'); 
            $table->rememberToken();
            $table->timestamps();
        });


        /* Schema::table('users', function($table) {
       $table->foreign('type_id')->references('Id')->on('usertypes');
   });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
