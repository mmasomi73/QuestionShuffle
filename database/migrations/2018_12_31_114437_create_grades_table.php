<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->timestamps();
        });
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('grade_id');
            $table->timestamps();

            $table->foreign('grade_id')->references('id')->on('grades');
        });
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('book_id');
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('sessions');
        Schema::dropIfExists('books');
        Schema::dropIfExists('grades');
    }
}
