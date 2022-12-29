<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleRepository;

class ArticleCategoryController extends Controller
{
    public function index(ArticleCategoryRepository $articleCategoryRepository)
    {
        $articleCategories = $articleCategoryRepository->getArticleCategories();

        return view('article-categories', compact('articleCategories'));
    }

    public function show($articleCategory, ArticleRepository $articleRepository)
    {
        $articleCategory = ArticleCategory::findOrFailBySlug($articleCategory);

        abort_unless($articleCategory->is_visible, 404);

        $articles = $articleRepository->getCategoryArticles($articleCategory);

        return view('article-category', compact('articleCategory', 'articles'));
    }
}
