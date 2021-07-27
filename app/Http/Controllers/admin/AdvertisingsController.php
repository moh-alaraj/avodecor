<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdvertisingsController extends Controller
{

    public function index()
    {
        $ads = Advertising::all();
        return view('admin.advertisings.index',compact('ads'));
    }


    public function create()
    {
        return view('admin.advertisings.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'photo' => 'required',
            'text' => 'nullable'
        ]);

        $request->merge([
            'slug' => Str::slug($request->title)
        ]);

        $data = $request->all();

        $fileName = $request->photo->move(public_path('images'), str_replace(' ', '', $request->photo->getClientOriginalName()));
        $data['photo'] = $fileName->getBasename();

        Advertising::create($data);

        return redirect(route('admin.advertisings.index'))
            ->with('success','Advertise created successfully');

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $ads = Advertising::findOrFail($id);
        return view('admin.advertisings.edit',compact('ads'));
    }


    public function update(Request $request, $id)
    {
        $ads = Advertising::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'text' => 'nullable'
        ]);
        $data = $request->all();
        $previous  = false;

        if ($request->hasFile('photo')) {
            $fileName = $request->photo->move(public_path('images'), str_replace(' ', '', $request->photo->getClientOriginalName()));
            $data['photo'] = $fileName->getBasename();
            $previous = $ads->photo;
        }

        $ads->update($data);

        if ($previous){
            unlink(public_path('images/' . $previous));
        }

        return redirect(route('admin.advertisings.index'))
            ->with('success','Advertise Updated successfully');
    }



    public function destroy($id)
    {
        $ads = Advertising::findOrFail($id);

        $ads->delete();

        if ($ads->photo && file_exists(public_path('images/' . $ads->photo))) {
            unlink(public_path('images/' . $ads->photo));
        }

        return redirect(route('admin.advertisings.index'))
            ->with('danger','Advertise deleted successfully');


    }
}
