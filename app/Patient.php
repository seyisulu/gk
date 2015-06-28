<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','hmo_id','policy_no','image_id','title','gender','type','address','dob','marital','religion','state_id','country_id','blood_group','genotype'];

    /**
     * Gets the user associated with this patient.
     *
     * @return \App\User
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Gets the HMO(s) associated with this patient.
     *
     * @return \App\HMO
     */
    public function hmo() {
        return $this->belongsTo('App\HMO');
    }

    /**
     * Gets the state associated with this patient.
     *
     * @return \App\State
     */
    public function state() {
        return $this->belongsTo('App\State');
    }

    /**
     * Gets the country associated with this patient.
     *
     * @return \App\Country
     */
    public function country() {
        return $this->belongsTo('App\Country');
    }

    /**
     * The upload associated with this patient's image.
     *
     * @return \App\Upload
     */
    public function image() {
        return $this->belongsTo('App\Upload', 'image_id', 'id');
    }

    /**
     * Gets the cards associated with this patient.
     *
     * @return \App\Kin
     */
    public function kin() {
        return $this->hasOne('App\Kin');
    }

    /**
     * Gets the cards associated with this patient.
     *
     * @return \App\Card[]
     */
    public function cards() {
        return $this->hasMany('App\Card');
    }

}
