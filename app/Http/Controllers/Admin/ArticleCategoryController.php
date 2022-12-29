<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleCategoryRequest;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Hír kategória létrehozás', ['only' => ['create', 'store']]);
        $this->middleware('permission:Hír kategória szerkesztés', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Hír kategória törlés', ['only' => ['destroy']]);
    }

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

        if (! $request->boolean('is_highlighted')) {
            $articleCategory->is_highlighted = false;
        }

        if ($request->imageUpload) {
            $this->imageUploading($request->imageUpload, $articleCategory);
        }

        $articleCategory->save();

        session()->flash('successMessage');
        return ['redirect' => '/admin/articleCategories/list'];
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

        $articleCategory->slug = null;

        if(! empty($articleCategory->image_upload) && $request->boolean('change_picture') == true) {
            $this->imageDelete($articleCategory);
        }

        $articleCategory->update($data);

        if (! $request->boolean('is_visible')) {
            $articleCategory->is_visible = false;
        }

        if (! $request->boolean('is_highlighted')) {
            $articleCategory->is_highlighted = false;
        }

        if ($request->imageUpload && $request->boolean('change_picture') == true) {
            $this->imageUploading($request->imageUpload, $articleCategory);
        }

        $articleCategory->save();

        session()->flash('successMessage');
        return ['redirect' => '/admin/articleCategories/list'];
    }

    public function destroy($articleCategoryId)
    {
        $articleCategory = ArticleCategory::findOrFail($articleCategoryId);

        $articleCategory->delete();

        session()->flash('deleteMessage');
        return redirect('/admin/articleCategories/list');
    }

    private function imageUploading($image, $articleCategory)
    {
        $newFilename = Str::after($image, 'tmp/');
        Storage::disk('public')->move($image, "images/articleCategory/$newFilename");
        $articleCategory->image_upload = "images/articleCategory/$newFilename";
    }

    private function imageDelete($articleCategory)
    {
        $oldFilename = $articleCategory->image_upload;
        Storage::disk('public')->delete($oldFilename);
    }
}
