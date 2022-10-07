<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageContentRequest;
use App\Models\PageContent;

class PageContentController extends Controller
{
    public function index()
    {
        $pageContents = PageContent::all();

        return view('admin.pageContent.list', compact('pageContents'));
    }

    public function create()
    {
        $pageContent = new PageContent();

        return view('admin.pageContent.form', compact('pageContent'));
    }

    public function store(PageContentRequest $request)
    {
        $data = $request->all();

        $pageContent = PageContent::create($data);

        session()->flash('successMessage');
        return ['redirect' => '/admin/pageContents/list'];
    }

    public function edit(int $pageContentId)
    {
        $pageContent = PageContent::findOrFail($pageContentId);

        return view('admin.pageContent.form', compact('pageContent'));
    }

    public function update($pageContentId, PageContentRequest $request)
    {
        $data = $request->all();

        $pageContent = PageContent::findOrFail($pageContentId);

        $pageContent->update($data);

        session()->flash('successMessage');
        return ['redirect' => '/admin/pageContents/list'];
    }

    public function destroy($pageContentId)
    {
        $pageContent = PageContent::findOrFail($pageContentId);

        $pageContent->delete();

        session()->flash('deleteMessage');
        return redirect('/admin/pageContents/list');
    }
}
