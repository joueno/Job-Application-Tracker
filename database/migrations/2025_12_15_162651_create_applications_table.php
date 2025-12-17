<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id('ApplicationID');
            $table->unsignedBigInteger('ApplicantID');
            $table->unsignedBigInteger('JobPostingID');
            $table->string('ResumeFile')->nullable();
            $table->string('Status')->default('Pending');
            $table->timestamp('CreatedDate')->useCurrent();
            $table->timestamp('UpdatedDate')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('ApplicantID')->references('ApplicantID')->on('applicants')->onDelete('cascade');
            $table->foreign('JobPostingID')->references('JobPostingID')->on('job_postings')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
