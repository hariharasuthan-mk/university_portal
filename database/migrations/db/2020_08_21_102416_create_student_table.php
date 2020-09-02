<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',40);
            $table->string('fullname',100);
            $table->enum('sex', ['male', 'female']);  

            $table->bigInteger('university_id')->unsigned();
            $table->foreign('university_id')->references('id')->on('university');
            
            $table->bigInteger('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('department');
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
        Schema::dropIfExists('student');
    }
}
