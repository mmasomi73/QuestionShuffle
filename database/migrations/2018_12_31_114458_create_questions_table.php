<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('question');
            $table->tinyInteger('rate')->default(0);
            $table->unsignedInteger('book_id')->nullable();
            $table->unsignedInteger('session_id')->nullable();
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('session_id')->references('id')->on('sessions');
        });
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text');
            $table->string('option');
            $table->unsignedInteger('question_id')->nullable();
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('questions');
        });
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('option');
            $table->text('answer')->nullable();
            $table->unsignedInteger('question_id')->nullable();
            $table->unsignedInteger('option_id')->nullable();
            $table->timestamps();

            $table->foreign('option_id')->references('id')->on('options');
            $table->foreign('question_id')->references('id')->on('questions');
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

        Schema::dropIfExists('answers');
        Schema::dropIfExists('options');
        Schema::dropIfExists('questions');
    }
}
