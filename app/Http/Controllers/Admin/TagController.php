<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Címke létrehozás', ['only' => ['create', 'store']]);
        $this->middleware('permission:Címke szerkesztés', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Címke törlés', ['only' => ['destroy']]);
    }

    public function index()
    {
        $tags = Tag::all();

        return view('admin.tag.list', compact('tags'));
    }

    public function create()
    {
        $tag = new Tag();

        return view('admin.tag.form', compact('tag'));
    }

    public function store(TagRequest $request)
    {
        $data = $request->all();

        $tag = Tag::create($data);

        if (! $request->boolean('is_visible')) {
            $tag->is_visible = false;
        }

        $tag->save();

        session()->flash('successMessage');
        return redirect('/admin/tags/list');
    }

    public function edit(int $tagId)
    {
        $tag = Tag::findOrFail($tagId);

        return view('admin.tag.form', compact('tag'));
    }

    public function update($tagId, TagRequest $request)
    {
        $data = $request->all();

        $tag = Tag::findOrFail($tagId);

        $tag->slug = null;

        $tag->update($data);

        if (! $request->boolean('is_visible')) {
            $tag->is_visible = false;
        }

        $tag->save();

        session()->flash('successMessage');
        return redirect('/admin/tags/list');
    }

    public function destroy($tagId)
    {
        $tag = Tag::findOrFail($tagId);

        $tag->delete();

        session()->flash('deleteMessage');
        return redirect('/admin/tags/list');
    }
}
