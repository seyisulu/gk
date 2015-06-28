<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'country_id'];

    /**
     * Gets the country associated with this state.
     *
     * @return \App\Country
     */
    public function country() {
        return $this->belongsToOne('App\Country');
    }

}
