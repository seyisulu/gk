<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patients', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('hmo_id')->unsigned()->nullable();
            $table->char('policy_no', 50)->nullable();
            $table->integer('image_id')->unsigned()->nullable();
            $table->enum('title', ['Mr.', 'Mrs.','Ms.','Dr.','Prof.','Chief']);
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('type', ['Regular', 'Managed']);
            $table->char('address', 255);

            $table->date('dob');
            $table->enum('marital', ['Single', 'Married','Separated','Divorced','Widowed']);
            $table->enum('religion', ['Christianity', 'Islam','Traditional','Other']);
            $table->integer('state_id')->unsigned();
            $table->integer('country_id')->unsigned();

            $table->enum('blood_group', ['A+', 'A-','B+','B-','AB+','AB-','O+','O-']);
            $table->enum('genotype', ['AA', 'AS','SS']);

			$table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id', 'fk_patient_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');//'cascade'
            $table->foreign('hmo_id', 'fk_patient_hmo_id')->references('id')->on('hmos')->onUpdate('cascade')->onDelete('cascade');//'set null'
            $table->foreign('state_id', 'fk_patient_state_id')->references('id')->on('states')->onUpdate('cascade')->onDelete('cascade');//'restrict'
            $table->foreign('country_id', 'fk_patient_country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');//'restrict'
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('patients');
	}

}
