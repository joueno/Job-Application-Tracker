<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            // Add ApplicationDate column if it doesn't exist
            if (!Schema::hasColumn('applications', 'ApplicationDate')) {
                $table->date('ApplicationDate')->nullable()->after('JobPostingID');
            }
        });
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            if (Schema::hasColumn('applications', 'ApplicationDate')) {
                $table->dropColumn('ApplicationDate');
            }
        });
    }
};
