<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class BlogsController extends Controller
{

    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index',compact('blogs'));
    }


    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('admin.blogs.create',compact('users','categories'));
    }

    public function Cuscreate()
    {
        $users = User::all();
        $categories = Category::all();
        return view('website.cuscreate',compact('users','categories'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'photo' => 'required',
            'text' => 'required',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'short' => 'required',
        ]);

        $request->merge([
            'slug' => $this->Arslug($request->title)
        ]);

        $data = $request->all();

        $fileName = $request->photo->move(public_path('images'), str_replace(' ', '', $request->photo->getClientOriginalName()));
        $data['photo'] = $fileName->getBasename();

        Blog::create($data);

        return redirect(route('website.blog'))
            ->with('success','Blog created successfully');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $blogs = Blog::findOrFail($id);
        $users = User::all();
        $categories = Category::all();
        return view('admin.blogs.edit',compact('blogs','users','categories'));
    }


    public function update(Request $request, $id)
    {
        $blogs = Blog::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'short' => 'required',
            'text' => 'required',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->all();

        $previous  = false;

        if ($request->hasFile('photo')) {
            $fileName = $request->photo->move(public_path('images'), str_replace(' ', '', $request->photo->getClientOriginalName()));
            $data['photo'] = $fileName->getBasename();
            $previous = $blogs->photo;
        }

        $blogs->update($data);

        if ($previous){
            unlink(public_path('images/' . $previous));
        }

        return redirect(route('admin.blogs.index'))
            ->with('success','Blog Updated successfully');
    }


    public function destroy($id)
    {
        $blogs = Blog::findOrFail($id);

        $blogs->delete();

        if ($blogs->photo && file_exists(public_path('images/' . $blogs->photo))) {
            unlink(public_path('images/' . $blogs->photo));
        }

        return redirect(route('admin.blogs.index'))
            ->with('danger','Blog deleted successfully');
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
