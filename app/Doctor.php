<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'hospital_id', 'license', 'status'];

    /**
     * Gets the user associated with this doctor.
     *
     * @return \App\User
     */
    public function user() {
        return $this->belongsToOne('App\User');
    }

    /**
     * Gets the hospital associated with this doctor.
     *
     * @return \App\Hospital
     */
    public function hospital() {
        return $this->belongsToOne('App\Hospital');
    }

}
