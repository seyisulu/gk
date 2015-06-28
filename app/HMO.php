<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class HMO extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hmos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['gkid', 'name', 'primary_contact_id', 'secondary_contact_id', 'phone', 'email', 'address', 'status'];

}
