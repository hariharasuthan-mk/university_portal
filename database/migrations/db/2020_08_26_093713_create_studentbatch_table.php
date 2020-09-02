<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentbatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentbatch', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('batchname', 50);            
            $table->enum('status', ['yes', 'no'])->default('no');

            $table->bigInteger('requested')->unsigned();
            $table->foreign('requested')->references('id')->on('users');
            $table->json('list')->nullable();

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
        Schema::dropIfExists('studentbatch');
    }
}
