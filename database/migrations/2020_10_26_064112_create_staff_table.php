<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('StaffId');
            
            $table->float('salary' , 10 , 3);
            $table->integer('age');
            $table->date('birthdate');
            $table->integer('workhours');
            //$table->integer('user_id')->unsigned();
             $table->string('phone')->default('11111111111');
              $table->string('Address')->default('Egypt');
             $table->integer('user_id');
            //$table->integer('specialist_Id');
            $table->integer('specialist_Id')->unsigned()->default(1);
            $table->timestamps();
        });
        /*Schema::table('staff', function($table) {
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
        Schema::dropIfExists('staff');
    }
}
