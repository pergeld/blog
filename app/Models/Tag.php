<?php

namespace App\Models;

use App\Enums\ColorType;
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
        'color',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'color' => ColorType::class,
    ];
}
