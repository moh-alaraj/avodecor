<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Tag;
use Illuminate\Http\Request;

class SlidersController extends Controller
{


    public function index()
    {
        $sliders = Slider::with('tags')->get();

        return view('admin.sliders.index',[
            'sliders' => $sliders,

        ]);
    }


    public function create()
    {
        return view('admin.sliders.create',[
            'sliders' => new Slider(),
            'tags' => Tag::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'photo' => 'required',
            'tag_id' => 'nullable|exists:tags,id'
        ]);

        $data = $request->all();

            $fileName = $request->photo->move(public_path('images'), str_replace(' ', '', $request->photo->getClientOriginalName()));
            $data['photo'] = $fileName->getBasename();

            $sliders = Slider::create($data);
            $sliders->tags()->sync($request->tag_id);

        return redirect(route('admin.sliders.index'))
            ->with('success','slider created successfully');
    }


    public function show($id)
    {
        $sliders = Slider::findOrFail($id);
        return view('admin.sliders.show',[
            'sliders' => $sliders,
        ]);
    }


    public function edit($id)
    {
        $sliders = Slider::findOrFail($id);
        return view('admin.sliders.edit',[
            'sliders' => $sliders,
            'tags'  => Tag::all()
        ]);
    }


    public function update(Request $request, $id)
    {
        $sliders = Slider::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'tag_id' => 'nullable|exists:tags,id'
        ]);

        $data = $request->all();
        $previous = false;
        if ($request->hasFile('photo')) {

            $fileName = $request->photo->move(public_path('images'), str_replace(' ', '', $request->photo->getClientOriginalName()));
            $data['photo'] = $fileName->getBasename();
            $previous = $sliders->photo;
        }
        $sliders->update($data);
        $sliders->tags()->sync($request->tag_id);


        if ($previous) {
            unlink(public_path('images/' . $previous));
        }



        return redirect(route('admin.sliders.index'))
            ->with('success','slider Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $sliders = Slider::findOrFail($id);

        $sliders->delete();

        if ($sliders->photo && file_exists(public_path('images/' . $sliders->photo))) {
            unlink(public_path('images/' . $sliders->photo));
        }

        return redirect()->route('admin.sliders.index')
            ->with('danger', "slider deleted successfully!");
    }
}
