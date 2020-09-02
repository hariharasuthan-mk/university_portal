<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('file_path')->nullable();

            $table->bigInteger('author_by')->unsigned();
            $table->foreign('author_by')->references('id')->on('users');

            $table->bigInteger('assigned_to')->unsigned();
            $table->foreign('assigned_to')->references('id')->on('users');

            $table->bigInteger('batch_id')->unsigned();
            $table->foreign('batch_id')->references('id')->on('studentbatch');

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
        Schema::dropIfExists('files');
    }
}
