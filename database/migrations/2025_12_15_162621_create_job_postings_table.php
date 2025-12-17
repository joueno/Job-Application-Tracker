<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id('JobPostingID');
            $table->string('Title');
            $table->string('Department');
            $table->text('Requirements')->nullable();
            $table->string('Status')->default('Open');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('job_postings');
    }
};
