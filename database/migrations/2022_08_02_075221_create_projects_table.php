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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('standard_id');
            $table->string('project_title');
            $table->integer('auditee_id');
            $table->integer('auditor_id');
            $table->dateTime('project_start_date');
            $table->dateTime('project_end_date');
            $table->dateTime('implement_start_date');
            $table->dateTime('implement_end_date');
            $table->dateTime('certificate_valid_from');
            $table->dateTime('certificate_valid_to');
            $table->integer('audit_type');
            $table->enum('status',['0','1']);
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
        Schema::dropIfExists('projects');
    }
};
