<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNurseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nurses', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('hospital_id')->unsigned();
            $table->char('license', 255);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id', 'fk_nurses_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');//'restrict'
            $table->foreign('hospital_id', 'fk_nurses_hospital_id')->references('id')->on('hospitals')->onUpdate('cascade')->onDelete('cascade');//'restrict'
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nurses');
	}

}
