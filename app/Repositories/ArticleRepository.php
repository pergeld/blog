<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function getHighlightedArticles()
    {
        return Article::published()
            ->latest('published_at')
            ->limit(4)
            ->get();
    }

    public function getArticles()
    {
        return Article::published()
        ->latest('published_at')
        ->paginate(12);
    }
}
