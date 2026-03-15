<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'description',
        'image',
        'schedule_info',
        'weekly_schedule',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'weekly_schedule' => 'array',
    ];
}
