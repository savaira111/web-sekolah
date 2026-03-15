<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtracurricularRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'class',
        'extracurricular',
        'motivation',
        'status',
    ];
}
