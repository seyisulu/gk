<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Gets all the states associated with this country.
     *
     * @return \App\State[]
     */
    public function states() {
        return $this->hasMany('State')->orderBy('name', 'asc');
    }

}
