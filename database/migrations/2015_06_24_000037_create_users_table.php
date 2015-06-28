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
            $table->char('gkid', 10)->unique();
			$table->char('lname', 25);
            $table->char('onames', 50);
			$table->char('email', 50);
            $table->char('phone', 15);
            $table->char('phone_alt', 15)->nullable();
			$table->char('password', 60);
			$table->timestamps();
            $table->softDeletes();

            $table->index(['lname', 'onames'], 'ix_users_name');
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
