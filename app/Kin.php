<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Kin extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'kin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'lname', 'onames', 'gender', 'email', 'phone', 'phone_alt', 'address', 'relationship'];

    /**
     * Gets the user associated with the next-of-kin.
     *
     * @return \App\User
     */
    public function user() {
        return $this->belongsToOne('App\User');
    }

}
