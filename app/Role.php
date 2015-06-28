<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Gets the users associated with this role.
     *
     * @return \App\User[]
     */
    public function users() {
        return $this->belongsToMany('App\User');
    }

}
