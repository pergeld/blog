<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleCategoryRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(ArticleCategoryRepository $articleCategoryRepository)
    {
        $articleCategories = $articleCategoryRepository->getHighlightedArticleCategories();

        return view('home', compact('articleCategories'));
    }
}
