<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use App\Models\Work;
use Illuminate\Http\Request;

class WorksController extends Controller
{

    public function index(){

        return view('website.works',[
           'works' => Work::all(),
            'ad' => Advertising::inRandomOrder()->limit(1)->first(),
        ]);
    }
}
