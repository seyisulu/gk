<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('states', function(Blueprint $table)
		{
			$table->increments('id');
            $table->char('name', 50)->unique();
            $table->integer('country_id')->unsigned();
			$table->timestamps();
            $table->softDeletes();

            $table->foreign('country_id', 'fk_state_country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');//'restrict'
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('states');
	}

}
