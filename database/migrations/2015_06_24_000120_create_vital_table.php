<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVitalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vitals', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('card_id')->unsigned();
            $table->float('temp');
            $table->char('bp', 15);
            $table->char('remark', 255);
			$table->timestamps();
            $table->softDeletes();

            $table->foreign('card_id', 'fk_vital_card_id')->references('id')->on('cards')->onUpdate('cascade')->onDelete('cascade');//'restrict'
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vitals');
	}

}
