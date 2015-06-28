<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hospitals', function(Blueprint $table)
		{
			$table->increments('id');
            $table->char('gkid', 10)->unique();
            $table->char('name', 255)->unique();
            $table->char('phone', 15);
            $table->char('email', 50);
            $table->char('address', 255);
			$table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hospitals');
	}

}
