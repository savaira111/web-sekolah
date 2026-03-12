<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Change to string first to allow any value
        Schema::table('applicants', function (Blueprint $table) {
            $table->string('status')->change();
        });

        // 2. Update existing data
        Illuminate\Support\Facades\DB::table('applicants')->where('status', 'Pending Review')->update(['status' => 'Menunggu Review']);
        Illuminate\Support\Facades\DB::table('applicants')->where('status', 'Approved')->update(['status' => 'Diterima']);
        Illuminate\Support\Facades\DB::table('applicants')->where('status', 'Rejected')->update(['status' => 'Ditolak']);

        // 3. Change back to new enum
        Schema::table('applicants', function (Blueprint $table) {
            $table->enum('status', ['Menunggu Review', 'Diterima', 'Ditolak'])->default('Menunggu Review')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->enum('status', ['Pending Review', 'Approved', 'Rejected'])->default('Pending Review')->change();
        });
    }
};
