<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $table = 'students';
	protected $primaryKey = 'id';
	protected $fillable = [
		'name',
		'family',
		'code',
		'avatar',
		'class_id',
		'password',
		'remember_token'
	];

	protected $hidden = [
		'password', 'remember_token',
	];
}
