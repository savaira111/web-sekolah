<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'title',
        'category',
        'event_date',
        'description',
        'is_visible'
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }}
