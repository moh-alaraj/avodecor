<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{

    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index',compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }


    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required|string'
        ]);
        $data = $request->all();
        Tag::create($data);
        return redirect()->route('admin.tags.index')
            ->with('success','Tag created successfully');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $tags = Tag::findOrFail($id);
        return view('admin.tags.edit',compact('tags'));
    }


    public function update(Request $request, $id)
    {
        $tags = Tag::findOrFail($id);
        $request->validate(['title' => 'required']);
        $data = $request->all();
        $tags->update($data);

        return redirect()->route('admin.tags.index')
            ->with('success','Tag Updated successfully');
    }


    public function destroy($id)
    {
        $tags = Tag::findOrFail($id);
        $tags->delete();

        return redirect()->route('admin.tags.index')
            ->with('danger','Tag deleted successfully');

    }
}
