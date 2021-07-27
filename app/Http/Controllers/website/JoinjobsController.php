<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use App\Models\User;
use App\Notifications\NewJopappCreatedNotification;
use Illuminate\Http\Request;

class JoinjobsController extends Controller
{

    public function index(){
        return view('website.jopapp',[
            'ad' => Advertising::inRandomOrder()->limit(1)->first(),
        ]);

    }

}
