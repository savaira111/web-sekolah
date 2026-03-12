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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique();
            
            // Personal Data
            $table->string('full_name');
            $table->string('nisn')->unique();
            $table->string('birth_place');
            $table->date('birth_date');
            $table->enum('gender', ['Male', 'Female'])->default('Male');
            $table->string('religion')->nullable();
            $table->string('citizenship')->default('Indonesian');
            $table->text('address');
            
            // Parent Data
            $table->string('father_name');
            $table->string('father_job');
            $table->string('father_phone');
            $table->string('mother_name');
            $table->string('mother_job');
            $table->string('mother_phone');
            $table->string('parent_income')->nullable();
            
            // Academic Data
            $table->string('school_origin')->nullable();
            $table->string('graduation_year')->nullable();
            $table->decimal('average_grade', 5, 2)->nullable();
            
            // Status & Documents
            $table->enum('status', ['Pending Review', 'Approved', 'Rejected'])->default('Pending Review');
            $table->string('profile_image')->nullable();
            $table->string('doc_kk')->nullable();
            $table->string('doc_akta')->nullable();
            $table->string('doc_ijazah')->nullable();
            $table->string('doc_raport')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
