<?php

namespace App\Repositories;

use App\Models\ArticleCategory;

class ArticleCategoryRepository
{
    public function getHighlightedArticleCategories()
    {
        $locale = app()->getLocale();

        return ArticleCategory::where('is_visible', true)
            ->where('is_highlighted', true)
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->get();
    }
}
