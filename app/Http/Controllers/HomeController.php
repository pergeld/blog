<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use App\Repositories\ArticleCategoryRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(ArticleRepository $articleRepository, ArticleCategoryRepository $articleCategoryRepository)
    {
        $articles = $articleRepository->getHighlightedArticles();
        $articleCategories = $articleCategoryRepository->getHighlightedArticleCategories();

        return view('home', compact('articles', 'articleCategories'));
    }
}
