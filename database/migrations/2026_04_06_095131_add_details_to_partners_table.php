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
        Schema::table('partners', function (Blueprint $table) {
            $table->string('location')->nullable()->after('category');
            $table->string('detail_image')->nullable()->after('location');
            $table->text('testimonial_text')->nullable()->after('detail_image');
            $table->string('testimonial_author')->nullable()->after('testimonial_text');
            $table->string('testimonial_role')->nullable()->after('testimonial_author');
            $table->string('testimonial_avatar')->nullable()->after('testimonial_role');
            $table->json('gallery_images')->nullable()->after('testimonial_avatar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn([
                'location',
                'detail_image',
                'testimonial_text',
                'testimonial_author',
                'testimonial_role',
                'testimonial_avatar',
                'gallery_images'
            ]);
        });
    }
};
