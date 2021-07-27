<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorksController extends Controller
{
    public function index()
    {
        $works = Work::all();
        return view('admin.works.index',compact('works'));
    }


    public function create()
    {
        return view('admin.works.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'photo' => 'required|image',
            'text' => 'nullable'
        ]);

        $request->merge([
            'slug' => Str::slug($request->title)
        ]);

        $data = $request->all();

        $fileName = $request->photo->move(public_path('images'), str_replace(' ', '', $request->photo->getClientOriginalName()));
        $data['photo'] = $fileName->getBasename();

        Work::create($data);

        return redirect(route('admin.works.index'))
            ->with('success','Work created successfully');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $works = Work::findOrFail($id);
        return view('admin.works.edit',compact('works'));
    }


    public function update(Request $request, $id)
    {
        $works = Work::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'text' => 'nullable'
        ]);

        $data = $request->all();

        $previous  = false;

        if ($request->hasFile('photo')) {
            $fileName = $request->photo->move(public_path('images'), str_replace(' ', '', $request->photo->getClientOriginalName()));
            $data['photo'] = $fileName->getBasename();
            $previous = $works->photo;
        }

        $works->update($data);

        if ($previous){
            unlink(public_path('images/' . $previous));
        }

        return redirect(route('admin.works.index'))
            ->with('success',' Work Updated successfully');
    }


    public function destroy($id)
    {
        $works = Work::findOrFail($id);

        $works->delete();

        if ($works->photo && file_exists(public_path('images/' . $works->photo))) {
            unlink(public_path('images/' . $works->photo));
        }

        return redirect(route('admin.works.index'))
            ->with('danger',"$works->title deleted successfully");    }
}
