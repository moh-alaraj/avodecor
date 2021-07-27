<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function index()
    {
        return view('admin.groups.index',[
            'groups' => Group::all(),
        ]);
    }


    public function create()
    {
        return view('admin.groups.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'photo' => 'required'
        ]);

        $data = $request->all();

        $fileName = $request->photo->move(public_path('images'), str_replace(' ', '', $request->photo->getClientOriginalName()));
        $data['photo'] = $fileName->getBasename();

        Group::query()->create($data);

        return redirect()->route('admin.groups.index')
            ->with('success','Created successfully');

    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $groups = Group::findOrFail($id);
        return view('admin.groups.edit',[
            'groups' => $groups,
        ]);
    }


    public function update(Request $request, $id)
    {
        $groups = Group::findOrFail($id);

        $request->validate([
        'title' => 'required',
        'text' => 'required',
        'photo' => 'nullable'
        ]);
        $data = $request->all();
        $previous  = false;

        if ($request->hasFile('photo')) {
            $fileName = $request->photo->move(public_path('images'), str_replace(' ', '', $request->photo->getClientOriginalName()));
            $data['photo'] = $fileName->getBasename();
            $previous = $groups->photo;
        }

        $groups->update($data);

        if ($previous){
            unlink(public_path('images/' . $previous));
        }

        return redirect()->route('admin.groups.index')
            ->with('success','Updated successfully');


    }


    public function destroy($id)
    {
        $groups = Group::findOrFail($id);
        $groups->delete();

        if ($groups->photo && file_exists(public_path('images/' . $groups->photo))) {
            unlink(public_path('images/' . $groups->photo));
        }


        return redirect()->route('admin.groups.index')
            ->with('danger','Deleted successfully');
    }
}
