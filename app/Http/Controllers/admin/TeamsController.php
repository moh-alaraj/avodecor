<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{

    public function index()
    {
        $teams = Team::all();
        return view('admin.teams.index',compact('teams'));
    }


    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'position' => 'nullable',
           'job' => 'required',
           'photo' => 'required'
        ]);
        $data = $request->all();
        $fileName = $request->photo->move(public_path('images'),str_replace(' ','',$request->photo->getClientOriginalName()));
        $data['photo'] = $fileName->getBaseName();

        Team::create($data);

        return redirect(route('admin.team.index'))
            ->with('success',' member added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $teams = Team::findOrFail($id);
        return view('admin.teams.edit',compact('teams'));
    }



    public function update(Request $request, $id)
    {
        $teams = Team::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'position' => 'nullable',
            'job' => 'required'
        ]);

        $data = $request->all();

        $previous  = false;

        if ($request->hasFile('photo')) {
            $fileName = $request->photo->move(public_path('images'), str_replace(' ', '', $request->photo->getClientOriginalName()));
            $data['photo'] = $fileName->getBasename();
            $previous = $teams->photo;
        }

        $teams->update($data);

        if ($previous){
            unlink(public_path('images/' . $previous));
        }

        return redirect(route('admin.team.index'))
            ->with('success',' Updated successfully');
    }


    public function destroy($id)
    {
        $teams = Team::findOrFail($id);
        $teams->delete();

        return redirect(route('admin.team.index'))
            ->with('danger',' Deleted successfully');
    }
}
