<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string'
        ]);
        $data = $request->all();
        Category::create($data);
        return redirect()->route('admin.categories.index')
            ->with('success','Category created successfully');
    }



    public function show($id)
    {

    }


    public function edit($id)
    {
        $categories = Category::findOrFail($id)  ;
        return view('admin.categories.edit',compact('categories'));
    }


    public function update(Request $request, $id)
    {
        $categories = Category::findOrFail($id)  ;
        $request->validate(['title' => 'required']);
        $data = $request->all();
        $categories->update($data);

        return redirect()->route('admin.categories.index')
            ->with('success','Category Updated successfully');
    }



    public function destroy($id)
    {
        $categories = Category::findOrFail($id) ;
        $categories->delete();

        return redirect()->route('admin.categories.index')
            ->with('danger','Category deleted successfully');

    }
}
