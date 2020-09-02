<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentbatchhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentbatchhistory', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('subject',50);
            $table->text('body');

            $table->bigInteger('requested')->unsigned();
            $table->foreign('requested')->references('id')->on('users');

            $table->bigInteger('responded')->unsigned();
            $table->foreign('responded')->references('id')->on('users');

            $table->bigInteger('depo_id')->unsigned();
            $table->foreign('depo_id')->references('id')->on('department');            

            $table->bigInteger('batch_id')->unsigned();
                        

            $table->enum('batch_status', ['batch_initiation',
                'denied', 'inprogress', 'not_yet_started',
                'waiting_for_approval', 'approved'])->default('waiting_for_approval');
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
        Schema::dropIfExists('studentbatchhistory');
    }
}
