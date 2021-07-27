<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeaturesController extends Controller
{
    public function index()
    {
        $features = Feature::all();
        return view('admin.features.index',compact('features'));
    }

    public function create()
    {
        return view('admin.features.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'text' => 'required'
        ]);

        $data = $request->all();

        $fileName = $request->icon->move(public_path('images'), str_replace(' ', '', $request->icon->getClientOriginalName()));
        $data['icon'] = $fileName->getBasename();

        Feature::create($data);

        return redirect(route('admin.features.index'))
            ->with('success','feature created successfully');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $features = Feature::findOrFail($id);
        return view('admin.features.edit',compact('features'));
    }


    public function update(Request $request, $id)
    {
        $features = Feature::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'text' => 'nullable'
        ]);
        $data = $request->all();
        $previous  = false;
        if ($request->hasFile('icon')) {
            $fileName = $request->icon->move(public_path('images'), str_replace(' ', '', $request->icon->getClientOriginalName()));
            $data['icon'] = $fileName->getBasename();
            $previous = $features->icon;
        }

        $features->update($data);

        if ($previous){
            unlink(public_path('images/' . $previous));
        }

        return redirect(route('admin.features.index'))
            ->with('success','feature Updated successfully');

    }

    public function destroy($id)
    {
        $features = Feature::findOrFail($id);

        $features->delete();

        if ($features->icon && file_exists(public_path('images/' . $features->icon))) {
            unlink(public_path('images/' . $features->icon));
        }

        return redirect(route('admin.features.index'))
            ->with('danger','feature deleted successfully');

    }
}
