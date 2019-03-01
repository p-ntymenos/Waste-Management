<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MonadesEpexergasias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ga_proc_units', function(Blueprint $table)
                       {

                           $table->increments('id');
                           $table->string('kafsis_code',255)->unique();
                           $table->string('name');
                           $table->string('proc_type',255);
                           $table->boolean('Cat1');
                           $table->boolean('Cat2');
                           $table->boolean('Cat3');
                           $table->boolean('Laspi');
                           $table->boolean('Fytika');
                           
                       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('ga_proc_units');
    }
}
