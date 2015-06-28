<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role_user', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->integer('user_id')->unsigned();
			$table->timestamps();
            $table->softDeletes();

            $table->foreign('role_id', 'fk_role_user_role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');//'restrict'
            $table->foreign('user_id', 'fk_role_user_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');//'restrict'
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('role_user');
	}

}
