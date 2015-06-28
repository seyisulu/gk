<?php namespace App;

use Hash;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['lname', 'onames', 'email', 'phone', 'phone_alt', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password'];

	/**
	 * Passwords must always be hashed
	 *
	 * @param $password
	 */
	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

    /**
     * Gets the next-of-kin associated with this user.
     *
     * @return \App\Kin
     */
    public function kin() {
        return $this->hasOne('App\Kin');
    }

    /**
     * Gets the patient(s) associated with this user.
     *
     * @return \App\Patient[]
     */
    public function patient() {
        return $this->hasMany('App\Patient');
    }

    /**
     * Gets the doctor(s) associated with this user.
     *
     * @return \App\Doctor[]
     */
    public function doctor() {
        return $this->hasMany('App\Doctor');
    }

    /**
     * Gets the nurse(s) associated with this user.
     *
     * @return \App\Nurse[]
     */
    public function nurse() {
        return $this->hasMany('App\Nurse');
    }

    /**
     * Gets all the role(s) associated with this user.
     *
     * @return \App\Role[]
     */
    public function roles() {
        return $this->belongsToMany('App\Role');
    }

}
