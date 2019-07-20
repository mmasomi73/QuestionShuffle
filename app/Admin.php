<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
	protected $table = 'admins';
	protected $primaryKey = 'id';
	protected $fillable = [
		'name',
		'email',
		'avatar',
		'role',
		'password',
		'remember_token'
	];

	protected $hidden = [
		'password', 'remember_token',
	];

}
