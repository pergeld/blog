<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function getHighlightedArticles()
    {
        $locale = app()->getLocale();

        return Article::where('is_visible', true)
            ->latest('published_at')
            ->limit(4)
            ->get();
    }
}
