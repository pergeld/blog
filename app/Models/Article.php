<?php

namespace App\Models;

use App\Traits\Slugs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, Slugs;

    protected $fillable = [
        'slug',
        'title',
        'lead',
        'content',
        'published_at',
        'expires_at',
        'is_visible',
        'user_id',
    ];

    protected $dates = [
        'published_at',
        'expires_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
