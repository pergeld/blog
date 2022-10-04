<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleCategoryRequest;
use App\Models\ArticleCategory;

class ArticleCategoryController extends Controller
{
    public function index()
    {
        $articleCategories = ArticleCategory::all();

        return view('admin.articleCategory.list', compact('articleCategories'));
    }

    public function create()
    {
        $articleCategory = new ArticleCategory();

        return view('admin.articleCategory.form', compact('articleCategory'));
    }

    public function store(ArticleCategoryRequest $request)
    {
        $data = $request->all();

        $articleCategory = ArticleCategory::create($data);

        if (! $request->boolean('is_visible')) {
            $articleCategory->is_visible = false;
        }

        $articleCategory->save();

        session()->flash('successMessage');
        return redirect('/admin/articleCategories/list');
    }

    public function edit(int $articleCategoryId)
    {
        $articleCategory = ArticleCategory::findOrFail($articleCategoryId);

        return view('admin.articleCategory.form', compact('articleCategory'));
    }

    public function update($articleCategoryId, ArticleCategoryRequest $request)
    {
        $data = $request->all();

        $articleCategory = ArticleCategory::findOrFail($articleCategoryId);

        $articleCategory->update($data);

        if (! $request->boolean('is_visible')) {
            $articleCategory->is_visible = false;
        }

        $articleCategory->save();

        session()->flash('successMessage');
        return redirect('/admin/articleCategories/list');
    }

    public function destroy($articleCategoryId)
    {
        $articleCategory = ArticleCategory::findOrFail($articleCategoryId);

        $articleCategory->delete();

        session()->flash('deleteMessage');
        return redirect('/admin/articleCategories/list');
    }
}
