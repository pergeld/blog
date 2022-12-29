<?php

namespace App\Models;

use App\Traits\Slugs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory, Slugs;

    protected $fillable = [
        'title',
        'is_visible',
        'image_upload',
        'is_highlighted',
        'slug',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'is_highlighted' => 'boolean',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function getCoverPicture()
    {
        $image = $this->image_upload;

        if (empty($image)) {
            return 'images/user.png';
        }

        return '/storage/' . $image;
    }

    public function getLink()
    {
        return route('articleCategories.show', ['articleCategory' => $this->slug]);
    }
}
