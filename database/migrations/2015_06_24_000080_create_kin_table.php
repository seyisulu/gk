<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKinTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kin', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->char('lname', 25);
            $table->char('onames', 50);
            $table->enum('gender', ['Male', 'Female']);
            $table->char('email', 50);
            $table->char('phone', 15);
            $table->char('phone_alt', 15)->nullable();
            $table->char('address', 255);
            $table->enum('relationship', ['Father', 'Mother','Husband','Wife','Son','Daughter','Brother','Sister','Half Brother','Half Sister','Step Brother','Step Sister','Step Father', 'Step Mother','Uncle','Aunt','Nephew','Niece','Cousin']);
			$table->timestamps();
            $table->softDeletes();

            $table->foreign('patient_id', 'fk_kin_patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');//'restrict'
            $table->unique('patient_id', 'ux_kin_patient_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kin');
	}

}
