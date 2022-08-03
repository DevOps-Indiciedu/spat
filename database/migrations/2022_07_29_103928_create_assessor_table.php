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
        Schema::create('assessor', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('company_name');
            $table->string('company_website');
            $table->string('company_physical_address');
            $table->string('assessor_lead_name');
            $table->string('assessor_pci_creds');
            $table->string('assessor_phone');
            $table->string('assessor_email');
            $table->string('assessor_review_name');
            $table->string('assessor_review_phone');
            $table->string('assessor_review_email');
            $table->string('date_of_report');
            $table->string('time_assessment_start_date');
            $table->string('time_assessment_complete_date');
            $table->string('identity_start_date');
            $table->string('identity_complete_date');
            $table->text('identity_decription');
            $table->text('pci_dss_version');
            $table->text('disclose_qsac');
            $table->text('efforts_qsac');
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
        Schema::dropIfExists('assessor');
    }
};
