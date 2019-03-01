<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
                       {

                           $table->increments('id');
                           $table->string('name');
                           $table->string('username')->unique();
                           $table->string('email')->unique();
                           $table->string('password', 60);
                           $table->string('phone',15);
                           $table->string('postal',15);
                           $table->string('userphoto',150);
                           $table->string('address',150);
                           $table->integer('customer_id');
                           $table->integer('region_id');
                           $table->integer('subregion_id');
                           $table->integer('municipality_id');
                           $table->string('network_id',255);
                           $table->string('mex_id',255);                           
                           $table->string('finalunit_id',255);  
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
        Schema::drop('users');
    }

}
