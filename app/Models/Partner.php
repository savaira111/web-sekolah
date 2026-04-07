<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'featured_image',
        'website_url',
        'description',
        'category',
        'location',
        'is_active',
        'testimonial_text',
        'testimonial_author',
        'testimonial_author_role',
        'testimonial_author_photo',
        'gallery_images',
        'student_testimonials_data',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'gallery_images' => 'array',
        'student_testimonials_data' => 'array',
    ];
}
