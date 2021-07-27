<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Subservices;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubservisesController extends Controller
{
    public function index()
    {
        $servicesD = Subservices::all();
        return view('admin.subservices.index',compact('servicesD'));
    }

    public function create()
    {

        return view('admin.subservices.create',[
            'sub' => new Subservices(),
            'services' => Service::all()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'text'  => 'required|string',
            'service_id' => 'required|exists:services,id',
            'photo' => 'required|image'
        ]);
        $request->merge([
            'slug' => $this->Arslug($request->title,'-'),
        ]);
        $data = $request->all();

        $filename = $request->photo->move(public_path('images'),str_replace(' ','',$request->photo->getClientOriginalName()));
        $data['photo'] = $filename->getBasename();

        Subservices::create($data);

        return redirect()->route('admin.subservises.index')
            ->with('success','serviceD created successfully');
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $servicesD = Subservices::findOrFail($id);
        return view('admin.subservices.edit',[
            'servicesD' => $servicesD,
            'services' => Service::all()
        ]);
    }



    public function update(Request $request, $id)
    {
        $servicesD = Subservices::findOrFail($id);
        $request->validate([
            'title' => 'required|string',
            'text'  => 'required|string',
            'service_id' => 'required|exists:services,id',
            'photo'  => 'nullable|image',
        ]);
        $data = $request->all();

        $previous = false;

        if($request->hasFile('photo')){

            $filename = $request->photo->move(public_path('images'),str_replace(' ','',$request->photo->getClientOriginalName()));
            $data['photo'] = $filename->getBasename();

            $previous = $servicesD->icon;
        }

        $servicesD->update($data);

        if ($previous){
            unlink(public_path('images/' . $previous));
        }
        return redirect()->route('admin.subservises.index')
            ->with('success','serviceD Updated successfully');



    }


    public function destroy($id)
    {
        $servicesD = Subservices::findOrFail($id);
        $servicesD->delete();

        if ($servicesD->photo && file_exists(public_path('images/' . $servicesD->photo))) {
            unlink(public_path('images/' . $servicesD->photo));
        }

        return redirect(route('admin.subservises.index'))
            ->with('danger','ServiceD deleted successfully');
    }
    public function Arslug($string, $separator = '-') {
        if (is_null($string)) {
            return "";
        }

        $string = trim($string);

        $string = mb_strtolower($string, "UTF-8");;

        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

        $string = preg_replace("/[\s-]+/", " ", $string);

        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }

}
