<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['gkid', 'name', 'phone', 'email', 'address'];

    /**
     * Gets all the vital records associated with the hospital.
     *
     * @return \App\Vital[]
     */
    public function vitals() {
        return $this->hasMany('App\Vital');
    }

    /**
     * Gets all the patients associated with the hospital.
     *
     * @return \App\Patient[]
     */
    public function patients() {
        return $this->hasManyThrough('App\Patient', 'App\Card');
    }

    /**
     * Gets the cards associated with this hospital.
     *
     * @return \App\Card[]
     */
    public function cards() {
        return $this->hasMany('App\Card');
    }

}
