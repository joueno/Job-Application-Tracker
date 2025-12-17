<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('hr_staff', function (Blueprint $table) {
            $table->id('HRStaffID');
            $table->string('Name');
            $table->string('Email')->unique();
            $table->string('Department');
            $table->string('Role');
            $table->string('Status')->default('Active');
            $table->text('Remarks')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('hr_staff');
    }
};
