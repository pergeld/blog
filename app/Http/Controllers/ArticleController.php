<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;

class ArticleController extends Controller
{
    public function index(ArticleRepository $articleRepository)
    {
        $articles = $articleRepository->getArticles();

        return view('articles', compact('articles'));
    }
}
