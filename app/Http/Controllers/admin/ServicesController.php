<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Nullable;

class ServicesController extends Controller
{

    public function index()
    {
        $services = Service::all();
        return view('admin.services.index',compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'icon'  => 'required|image'
        ]);
        $request->merge([
            'slug' => $this->Arslug($request->title,'-')
        ]);
        $data = $request->all();

        $filename = $request->icon->move(public_path('images'),str_replace(' ','',$request->icon->getClientOriginalName()));
        $data['icon'] = $filename->getBasename();

        Service::create($data);

        return redirect()->route('admin.services.index')
            ->with('success','service created successfully');
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $services = Service::findOrFail($id);
        return view('admin.services.edit',compact('services'));
    }



    public function update(Request $request, $id)
    {
        $services = Service::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'icon' => 'nullable'
        ]);
        $data = $request->all();

        $previous = false;

        if($request->hasFile('icon')){

            $filename = $request->icon->move(public_path('images'),str_replace(' ','',$request->icon->getClientOriginalName()));
            $data['icon'] = $filename->getBasename();

            $previous = $services->icon;
        }

        $services->update($data);

        if ($previous){
            unlink(public_path('images/' . $previous));
        }
        return redirect()->route('admin.services.index')
            ->with('success','service Updated successfully');



    }


    public function destroy($id)
    {
        $services = Service::findOrFail($id);
        $services->delete();

        if ($services->icon && file_exists(public_path('images/' . $services->icon))) {
            unlink(public_path('images/' . $services->icon));
        }

        return redirect(route('admin.services.index'))
            ->with('danger','Service deleted successfully');
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
