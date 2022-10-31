<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'is_visible',
        'image_upload',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
