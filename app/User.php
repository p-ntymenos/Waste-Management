<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
<<<<<<< HEAD
=======
use Messagable;
>>>>>>> newGorilla

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, EntrustUserTrait;

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
<<<<<<< HEAD
	protected $fillable = ['name','username', 'email', 'password', 'status'];
=======
	protected $fillable = ['name','username', 'email', 'password', 'status' , 'customer_id', 'address', 'postal', 'phone', 'userphoto', 'region_id', 'subregion_id' , 'municipality_id','network_id' , 'mex_id', 'finalunit_id'];
>>>>>>> newGorilla

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

}