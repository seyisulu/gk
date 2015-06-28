<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'hospital_id', 'license'];

    /**
     * Gets the user associated with this nurse.
     *
     * @return \App\User
     */
    public function user() {
        return $this->belongsToOne('App\User');
    }

    /**
     * Gets the hospital associated with this nurse.
     *
     * @return \App\Hospital
     */
    public function hospital() {
        return $this->belongsToOne('App\Hospital');
    }

}
