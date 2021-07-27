<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('website.contact',[
            'ad' => Advertising::inRandomOrder()->limit(1)->first(),
            ]);
    }
}
