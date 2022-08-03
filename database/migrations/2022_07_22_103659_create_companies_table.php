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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_contact_name');
            $table->string('company_phone');
            $table->string('company_email');
            $table->string('company_website')->nullable();;
            $table->string('company_address')->nullable();;
            $table->string('company_standard')->nullable();;
            $table->string('company_max_users')->default('0');;
            $table->string('company_folder_name')->nullable();;
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
        Schema::dropIfExists('companies');
    }
};
