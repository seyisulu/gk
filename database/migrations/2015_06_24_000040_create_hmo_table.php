<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHmoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hmos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->char('gkid', 10)->unique();
            $table->char('name', 255)->unique();
            $table->integer('primary_contact_id')->unsigned()->nullable();
            $table->integer('secondary_contact_id')->unsigned()->nullable();

            $table->char('phone', 15);
            $table->char('email', 50);
            $table->char('address', 255);
            $table->enum('status', ['Listed', 'Confirmed', 'Unconfirmed']);
			$table->timestamps();
            $table->softDeletes();

            $table->foreign('primary_contact_id', 'fk_hmo_primary_contact_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');//'cascade'
            $table->foreign('secondary_contact_id', 'fk_hmo_secondary_contact_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');//'cascade'
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hmos');
	}

}
