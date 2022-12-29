<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleCategoryRepository;

class ArticleCategoryController extends Controller
{
    public function index(ArticleCategoryRepository $articleCategoryRepository)
    {
        $articleCategories = $articleCategoryRepository->getArticleCategories();

        return view('article-categories', compact('articleCategories'));
    }
}
