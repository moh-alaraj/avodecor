<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index(){
        $blogs = Blog::Latest()->paginate(4);
        return view('website.blog',[
            'blogs' => $blogs
        ]);

    }
    public function detail($slug){
        $blogs = Blog::where('slug' , '=' , $slug)->firstOrFail();

        $c_blog = Blog::OrderBy('views','desc')->limit(4)->get();

        $r_blog = Blog::where('category_id','=', $blogs->category_id)->limit(3)->get();

        $blogs->increment('views');

        return view('website.blog-d',[
            'blogs' => $blogs,
            'ad' => Advertising::inRandomOrder()->limit(1)->first(),
            'ads' => Advertising::inRandomOrder()->limit(1)->first(),
            'c_blog' => $c_blog,
            'r_blog' => $r_blog
        ]);
    }
}
