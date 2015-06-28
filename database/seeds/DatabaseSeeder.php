<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $this->call('RoleTableSeeder');
        $this->call('CountryTableSeeder');
        $this->call('StateTableSeeder');
        $this->call('UploadTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('HMOTableSeeder');
        $this->call('HospitalTableSeeder');
        $this->call('PatientTableSeeder');
        $this->call('KinTableSeeder');
        $this->call('DoctorTableSeeder');
        $this->call('NurseTableSeeder');
        $this->call('CardTableSeeder');
        $this->call('VitalTableSeeder');
        $this->call('RoleUserTableSeeder');
	}

}

class RoleTableSeeder extends Seeder {

    /**
     * Run the roles table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        \App\Role::create(['name'=>'Admin']);
        \App\Role::create(['name'=>'HMO']);
        \App\Role::create(['name'=>'Doctor']);
        \App\Role::create(['name'=>'Nurse']);
    }

}

class CountryTableSeeder extends Seeder {

    /**
     * Run the countries table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();

        \App\Country::create(['name'=>'Nigeria']);
        \App\Country::create(['name'=>'Ghana']);
    }

}

class StateTableSeeder extends Seeder {

    /**
     * Run the states table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->delete();

        \App\State::create(['name'=>'Lagos', 'country_id'=>1]);
        \App\State::create(['name'=>'FCT', 'country_id'=>1]);
        \App\State::create(['name'=>'Accra', 'country_id'=>2]);
    }

}

class UploadTableSeeder extends Seeder {

    /**
     * Run the uploads table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('uploads')->delete();

        \App\Upload::create(['path'=>'D02877C7-0353-4016-B4BB-D5B4F20CE0C6.png']);
    }

}

class UserTableSeeder extends Seeder {

    /**
     * Run the users table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        \App\User::create(['gkid'=>'5000000001', 'lname'=>'Olowo', 'onames'=>'Emma Seyi', 'email' => 'eolowo@sulusoft.com','phone'=>'08055554323','phone_alt'=>null, 'password'=>'passme']);
        \App\User::create(['gkid'=>'5000000002', 'lname'=>'Doctor', 'onames'=>'Six Female', 'email' => 'dsix@sulusoft.com','phone'=>'08055554324','phone_alt'=>'08055554325', 'password'=>'password']);
        \App\User::create(['gkid'=>'5000000003', 'lname'=>'Patient', 'onames'=>'One Male', 'email' => 'pone@sulusoft.com','phone'=>'080555543246','phone_alt'=>'08055554327', 'password'=>'password']);
        \App\User::create(['gkid'=>'5000000004', 'lname'=>'HMO', 'onames'=>'Two Female', 'email' => 'htwo@sulusoft.com','phone'=>'08055554326','phone_alt'=>'08055554324', 'password'=>'password']);
        \App\User::create(['gkid'=>'5000000005', 'lname'=>'Nurse', 'onames'=>'April Female', 'email' => 'anurse@sulusoft.com','phone'=>'08055554334','phone_alt'=>'08055554345', 'password'=>'password']);
    }

}

class HMOTableSeeder extends Seeder {

    /**
     * Run the HMOs table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hmos')->delete();

        \App\HMO::create(['gkid'=>'1000000001', 'name'=>'Novo Health Africa Ltd.', 'primary_contact_id'=>4, 'secondary_contact_id'=>null, 'phone'=>'+2347065572121','email'=>'info@novo.com','address'=>'1 Adekola Balogun Street, Off Remi Olowude Street, Lekki Phase I, Lagos.', 'status'=>'Listed']);
        \App\HMO::create(['gkid'=>'1000000002', 'name'=>'Confirmed HMO Ltd.', 'primary_contact_id'=>null, 'secondary_contact_id'=>null, 'phone'=>'+2348005554321','email'=>'info@chmo.com','address'=>'2 Adekola Balogun Street, Off Remi Olowude Street, Lekki Phase I, Lagos.', 'status'=>'Confirmed']);
        \App\HMO::create(['gkid'=>'1000000003', 'name'=>'Unconfirmed HMO Ltd.', 'primary_contact_id'=>null, 'secondary_contact_id'=>null, 'phone'=>'+2348005554322','email'=>'info@uhmo.com','address'=>'3 Adekola Balogun Street, Off Remi Olowude Street, Lekki Phase I, Lagos.', 'status'=>'Unconfirmed']);
    }

}

class HospitalTableSeeder extends Seeder {

    /**
     * Run the hospitals table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hospitals')->delete();

        \App\Hospital::create(['gkid'=>'2000000001', 'name'=>'Hospital One', 'phone'=>'+2347065572123','email'=>'info@hone.com','address'=>'4 Adekola Balogun Street, Off Remi Olowude Street, Lekki Phase I, Lagos.']);
        \App\Hospital::create(['gkid'=>'2000000002', 'name'=>'Hospital Two', 'phone'=>'+2348005554324','email'=>'info@htwo.com','address'=>'5 Adekola Balogun Street, Off Remi Olowude Street, Lekki Phase I, Lagos.']);
        \App\Hospital::create(['gkid'=>'2000000003', 'name'=>'Hospital Three', 'phone'=>'+2348005554325','email'=>'info@hthree.com','address'=>'6 Adekola Balogun Street, Off Remi Olowude Street, Lekki Phase I, Lagos.']);
    }

}

class PatientTableSeeder extends Seeder {

    /**
     * Run the patients table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->delete();

        \App\Patient::create(['user_id'=>3, 'hmo_id'=>null, 'policy_no'=>null, 'image_id' => 1, 'title'=>'Mr.', 'gender'=>'Male','type'=>'Regular','address'=>'46 Virtual Lane, Computeville, Lagos.','dob'=>\Carbon\Carbon::parse('April 15, 1970'),'marital'=>'Married','religion'=>'Christianity','state_id'=>1,'country_id'=>1,'blood_group'=>'B+','genotype'=>'AS']);
    }

}

class KinTableSeeder extends Seeder {

    /**
     * Run the kin table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kin')->delete();

        \App\Kin::create(['patient_id'=>1, 'lname'=>'Patient', 'onames'=>'Juli Bose', 'gender' => 'Female', 'email'=>'bosep@sulusoft.com', 'phone'=>'+2347055556789','phone_alt'=>'+2348055556323','address'=>'46 Virtual Lane, Computeville, Lagos.','relationship'=>'Wife']);

    }

}

class DoctorTableSeeder extends Seeder {

    /**
     * Run the doctors table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->delete();

        \App\Doctor::create(['user_id'=>2, 'hospital_id'=>1, 'license'=>'LICXXXXXXX', 'status'=>'General']);
    }

}

class NurseTableSeeder extends Seeder {

    /**
     * Run the nurses table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nurses')->delete();

        \App\Nurse::create(['user_id'=>5, 'hospital_id'=>1, 'license'=>'LICXXXXXXY']);
    }

}

class CardTableSeeder extends Seeder {

    /**
     * Run the cards table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->delete();

        \App\Card::create(['hospital_id'=>1, 'patient_id'=>1]);
    }

}

class VitalTableSeeder extends Seeder {

    /**
     * Run the vitals table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vitals')->delete();

        \App\Vital::create(['card_id'=>1, 'temp'=>38, 'bp'=>'120/98 mmHg', 'remark'=>'Temperature slightly high, blood pressure okay.']);
    }

}

class RoleUserTableSeeder extends Seeder {

    /**
     * Run the role_user table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->delete();

        \App\RoleUser::create(['role_id'=>1, 'user_id'=>1]);//Admin
        \App\RoleUser::create(['role_id'=>2, 'user_id'=>4]);//HMO
        \App\RoleUser::create(['role_id'=>3, 'user_id'=>2]);//Doctor
        \App\RoleUser::create(['role_id'=>4, 'user_id'=>5]);//Nurse
    }

}