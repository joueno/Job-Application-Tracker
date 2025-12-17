<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->id('InterviewID');
            $table->unsignedBigInteger('ApplicationID');
            $table->unsignedBigInteger('HRStaffID');
            $table->dateTime('DateTime');
            $table->string('Status')->default('Scheduled');
            $table->text('Remarks')->nullable();

            $table->foreign('ApplicationID')
                ->references('ApplicationID')
                ->on('applications')
                ->onDelete('cascade');

            $table->foreign('HRStaffID')
                ->references('HRStaffID')
                ->on('hr_staff')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
