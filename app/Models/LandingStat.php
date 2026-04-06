<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingStat extends Model
{
    use HasFactory;

    protected $table = 'landing_stats';

    protected $fillable = [
        'title',
        'value',
        'icon',
        'color',
        'order',
        'is_active',
    ];
}
