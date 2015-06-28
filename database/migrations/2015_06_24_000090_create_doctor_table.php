<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doctors', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('hospital_id')->unsigned();
            $table->char('license', 255);
            $table->enum('status', ['General', 'Consultant']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id', 'fk_doctors_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');//'restrict'
            $table->foreign('hospital_id', 'fk_doctors_hospital_id')->references('id')->on('hospitals')->onUpdate('cascade')->onDelete('cascade');//'restrict'
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('doctors');
	}

}
