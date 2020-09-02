<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->json('finallist')->nullable();
            
            $table->bigInteger('batch_id')->unsigned();
            $table->foreign('batch_id')->references('id')->on('studentbatch');

            $table->bigInteger('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('users');

            $table->bigInteger('requested_to')->unsigned();
            $table->foreign('requested_to')->references('id')->on('users');

            $table->text('body');

            $table->enum('publish', ['yes', 'no'])->default('no');

            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('course');

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
        Schema::dropIfExists('results');
    }
}
