<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('name');
	        $table->string('email')->unique();
	        $table->string('avatar')->nullable();
	        $table->integer('role')->nullable();
	        $table->timestamp('email_verified_at')->nullable();
	        $table->string('password');
	        $table->rememberToken();
	        $table->timestamps();
        });

	    Schema::create('teachers', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('name');
		    $table->string('family');
		    $table->string('email')->unique();
		    $table->string('code')->unique();
		    $table->string('mobile')->unique();
		    $table->string('avatar')->nullable();
		    $table->integer('role')->nullable();
		    $table->string('password');
		    $table->rememberToken();
		    $table->timestamps();
	    });

	    Schema::create('students', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('name');
		    $table->string('family');
		    $table->string('code')->unique();
		    $table->string('avatar')->nullable();
		    $table->string('password');
		    $table->unsignedInteger('class_id')->nullable();
		    $table->rememberToken();
		    $table->timestamps();
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('students');
    }
}
