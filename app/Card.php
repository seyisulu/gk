<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hospital_id', 'patient_id'];

    /**
     * Gets the vital records associated with this card.
     *
     * @return \App\Vital[]
     */
    public function vitals() {
        return $this->hasMany('Vital');
    }

    /**
     * Gets the patient associated with this card.
     *
     * @return \App\Patient
     */
    public function patient() {
        return $this->belongsTo('App\Patient');
    }

    /**
     * Gets the hospital associated with this card.
     *
     * @return \App\Hospital
     */
    public function hospital() {
        return $this->belongsTo('App\Hospital');
    }

}
