<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use App\Models\Service;
use App\Models\Subservices;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index($slug) {

        $services = Service::where('slug' , '=' , $slug)->firstOrFail();
        $ads = Advertising::all();
        return view('website.services',[
           'services' => $services,
           'ads' => $ads
        ]);
    }
}
