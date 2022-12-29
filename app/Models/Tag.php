<?php

namespace App\Models;

use App\Traits\Slugs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory, Slugs;

    protected $fillable = [
        'title',
        'is_visible',
        'slug',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];
}
