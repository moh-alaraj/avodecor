<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutusController extends Controller
{

    public function index()
    {
        $abouts = AboutUs::all();
        return view('admin.about.index',compact('abouts'));
    }

    public function create()
    {
        return view('admin.about.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'photo' => 'required',
            'text' => 'nullable'
        ]);


        $data = $request->all();

        $fileName = $request->photo->move(public_path('images'), str_replace(' ', '', $request->photo->getClientOriginalName()));
        $data['photo'] = $fileName->getBasename();

        AboutUs::create($data);

        return redirect(route('admin.about-us.index'))
            ->with('success','created successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $abouts = AboutUs::findOrFail($id);
        return view('admin.about.edit',compact('abouts'));
    }


    public function update(Request $request, $id)
    {
        $abouts = AboutUs::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'text' => 'nullable'
        ]);
        $data = $request->all();
        $previous  = false;

        if ($request->hasFile('photo')) {
            $fileName = $request->photo->move(public_path('images'), str_replace(' ', '', $request->photo->getClientOriginalName()));
            $data['photo'] = $fileName->getBasename();
            $previous = $abouts->photo;
        }

        $abouts->update($data);

        if ($previous){
            unlink(public_path('images/' . $previous));
        }

        return redirect(route('admin.about-us.index'))
            ->with('success','Updated successfully');
    }




    public function destroy($id)
    {
        $abouts = AboutUs::findOrFail($id);

        $abouts->delete();

        if ($abouts->photo && file_exists(public_path('images/' . $abouts->photo))) {
            unlink(public_path('images/' . $abouts->photo));
        }

        return redirect(route('admin.about-us.index'))
            ->with('danger','deleted successfully');
    }
}
