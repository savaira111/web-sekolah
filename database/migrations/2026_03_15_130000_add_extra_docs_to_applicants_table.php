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
        Schema::table('applicants', function (Blueprint $table) {
            $table->string('doc_pernyataan')->nullable();
            $table->string('doc_shun')->nullable();
            $table->string('doc_ijazah_sd')->nullable();
            $table->string('doc_domisili')->nullable();
            $table->string('doc_ktp_ortu')->nullable();
            $table->string('doc_sehat_badan')->nullable();
            $table->string('doc_sehat_mata')->nullable();
            $table->string('doc_prestasi')->nullable();
            $table->string('doc_form')->nullable();
            $table->string('doc_skl')->nullable();
            $table->string('doc_kip_pkh')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->dropColumn([
                'doc_pernyataan',
                'doc_shun',
                'doc_ijazah_sd',
                'doc_domisili',
                'doc_ktp_ortu',
                'doc_sehat_badan',
                'doc_sehat_mata',
                'doc_prestasi',
                'doc_form',
                'doc_skl',
                'doc_kip_pkh'
            ]);
        });
    }
};
