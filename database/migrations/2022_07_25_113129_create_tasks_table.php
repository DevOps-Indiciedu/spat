<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('task_title');
            $table->text('task_des');
            $table->string('priority');
            $table->integer('assign_to');
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->dateTime('dl_datetime');
            $table->integer('status');
            $table->integer('task_progress');
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
        Schema::dropIfExists('tasks');
    }
};
