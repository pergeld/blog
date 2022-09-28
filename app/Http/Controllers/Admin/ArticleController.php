<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('published_at', 'desc')->get();

        return view('admin.article.list', compact('articles'));
    }

    public function create()
    {
        $article = new Article();

        return view('admin.article.form', compact('article'));
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->all();

        $data['published_at'] = $request->get('published_date') . ' ' . $request->get('published_time') . ':00';
        $data['expires_at'] = $request->get('expires_date') . ' ' . $request->get('expires_time') . ':00';
        $data['user_id'] = auth()->user()->id;

        $article = Article::create($data);

        if (! $request->boolean('is_visible')) {
            $article->is_visible = false;
        }

        if($request->imageUpload) {
            $this->imageUploading($request->imageUpload, $article);
        }

        $article->save();

        session()->flash('successMessage', 'Hír');
        return ['redirect' => '/admin/articles/list'];
    }

    public function edit(int $articleId)
    {
        $article = Article::findOrFail($articleId);

        return view('admin.article.form', compact('article'));
    }

    public function update($articleId, ArticleRequest $request)
    {
        $data = $request->all();

        $data['published_at'] = $request->get('published_date') . ' ' . $request->get('published_time') . ':00';
        $data['expires_at'] = $request->get('expires_date') . ' ' . $request->get('expires_time') . ':00';
        $data['user_id'] = auth()->user()->id;

        $article = Article::findOrFail($articleId);

        if(! empty($article->imageUpload) && $request->boolean('change_picture') == true) {
            $this->imageDelete($article);
        }

        $article->update($data);

        if (! $request->boolean('is_visible')) {
            $article->is_visible = false;
        }

        if($request->imageUpload && $request->boolean('change_picture') == true) {
            $this->imageUploading($request->imageUpload, $article);
        }

        $article->save();

        session()->flash('successMessage', 'Hír');
        return ['redirect' => '/admin/articles/list'];
    }

    public function destroy($articleId)
    {
        $article = Article::findOrFail($articleId);

        $article->delete();

        return redirect('/admin/articles/list');
    }

    private function imageUploading($image, $article)
    {
        $newFilename = Str::after($image, 'tmp/');
        Storage::disk('public')->move($image, "images/$newFilename");
        $article->imageUpload = "images/$newFilename";
    }

    private function imageDelete($article)
    {
        $oldFilename = $article->imageUpload;
        Storage::disk('public')->delete($oldFilename);
    }
}
