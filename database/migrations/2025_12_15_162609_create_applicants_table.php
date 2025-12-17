<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
   public function up()
{
    Schema::create('applicants', function (Blueprint $table) {
        $table->id('ApplicantID');
        $table->string('Name');
        $table->string('Email')->unique();
        $table->string('Phone');
        $table->text('Resume')->nullable();
        $table->timestamps();
    });
}

    public function down(): void {
        Schema::dropIfExists('applicants');
    }
};
