<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Advertising;
use App\Models\Blog;
use App\Models\Feature;
use App\Models\HowToOrder;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Work;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        return view('website.index',[
            'sliders' => Slider::all(),
            'services' => Service::all(),
            'features' => Feature::all(),
            'works' => Work::limit(3)->get(),
            'blogs' => Blog::limit(4)->get(),
            'horders' => HowToOrder::all(),
            'ad' => Advertising::inRandomOrder()->limit(1)->first()
        ]);
    }

    public function about(){
        return view('website.about-as',[
            'ab1' => AboutUs::findOrFail(1),
            'ab2' => AboutUs::findOrFail(2),
            'ad' => Advertising::inRandomOrder()->limit(1)->first()

        ]);
    }
}
