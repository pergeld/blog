<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(ArticleRepository $articleRepository)
    {
        $articles = $articleRepository->getArticles();

        return view('articles', compact('articles'));
    }

    public function show($article)
    {
        $article = Article::findOrFailBySlug($article);

        abort_unless($article->isPublished() || Auth::user(), 404);

        return view('article', compact('article'));
    }
}
