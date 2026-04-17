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
            $table->string('featured_image')->nullable()->after('location');
            $table->text('testimonial_text')->nullable()->after('featured_image');
            $table->string('testimonial_author')->nullable()->after('testimonial_text');
            $table->string('testimonial_author_role')->nullable()->after('testimonial_author');
            $table->string('testimonial_author_photo')->nullable()->after('testimonial_author_role');
            $table->json('gallery_images')->nullable()->after('testimonial_author_photo');
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
                'featured_image',
                'testimonial_text',
                'testimonial_author',
                'testimonial_author_role',
                'testimonial_author_photo',
                'gallery_images'
            ]);
        });
    }
};
