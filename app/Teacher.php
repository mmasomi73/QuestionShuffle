<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	protected $table = 'teachers';
	protected $primaryKey = 'id';
	protected $fillable = [
		'name',
		'family',
		'email',
		'code',
		'mobile',
		'avatar',
		'role',
		'password',
		'remember_token'
	];

	protected $hidden = [
		'password', 'remember_token',
	];
}
