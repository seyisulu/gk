<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cards', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('hospital_id')->unsigned();
            $table->integer('patient_id')->unsigned();
			$table->timestamps();
            $table->softDeletes();

            $table->foreign('hospital_id', 'fk_cards_hospital_id')->references('id')->on('hospitals')->onUpdate('cascade')->onDelete('cascade');//'restrict'
            $table->foreign('patient_id', 'fk_cards_user_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');//'restrict'
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cards');
	}

}
