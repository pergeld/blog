<?php

namespace App\Models;

use App\Traits\Slugs;
use Carbon\Carbon;
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
        'imageUpload',
        'article_category_id',
    ];

    protected $dates = [
        'published_at',
        'expires_at',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function articleCategory()
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function isPublished()
    {
        if (! $this->is_visible) {
            return false;
        }

        if ($this->published_at > Carbon::now()) {
            return false;
        }

        if ($this->expires_at && $this->expires_at <= Carbon::now()) {
            return false;
        }

        return true;
    }

    public function scopePublished($builder)
    {
        $builder->where('is_visible', true)
            ->where('published_at', '<=', Carbon::now())
            ->where(function ($q) {
                $q->where('expires_at', '>', Carbon::now())
                    ->orWhereNull('expires_at');
            });
    }

    public function getLink()
    {
        return route('articles.show', ['article' => $this->slug]);
    }

    public function getCardCover()
    {
        $image = $this->imageUpload;

        if (empty($image)) {
            return null;
        }

        return '/storage/' . $image;
    }

    public function getCover()
    {
        $image = $this->imageUpload;

        if (empty($image)) {
            return null;
        }

        return '/storage/' . $image;
    }
}
