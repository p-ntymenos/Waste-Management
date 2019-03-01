<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAppointment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
                Schema::create('ga_apointments', function(Blueprint $table)
                       {

                           $table->increments('id');
                           $table->string('name');
                           $table->string('phone');
                           $table->string('mobile');
                           $table->string('city');
                           $table->string('type_company');
                           $table->string('email');
                           $table->string('address');
                           $table->string('postal');
                           $table->string('description');
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
        Schema::drop('ga_apointments');
    }
}
