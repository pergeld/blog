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

    public function getCategoryArticles($articleCategory)
    {
        return Article::published()
            ->when(! is_null($articleCategory), function ($query) use ($articleCategory) {
                return $query->where('article_category_id', $articleCategory->id);
            })
            ->latest('published_at')
            ->get();
    }
}
