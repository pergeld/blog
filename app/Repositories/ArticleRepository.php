<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function getHighlightedArticles()
    {
        $locale = app()->getLocale();

        return Article::published()
            ->latest('published_at')
            ->limit(4)
            ->get();
    }
}
