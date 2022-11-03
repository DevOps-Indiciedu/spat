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
        Schema::create('project_planning', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->text('template_name');
            $table->dateTime('start_date')->nullable;
            $table->dateTime('end_date')->nullable;
            $table->integer('responsible_user')->nullable;
            $table->enum('status',['0','1','2'])->nullable;
            $table->integer('added_by');
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
        Schema::dropIfExists('project_planning');
    }
};
