<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',40);
            $table->string('duration',40); 
            $table->enum('status', ['yes', 'no'])->default('no');
            
            $table->bigInteger('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('users');  

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
        Schema::dropIfExists('course');
    }
}
