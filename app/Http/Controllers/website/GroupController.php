<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(){
        return view('website.group',[
            'groups' => Group::all(),
            'ad' => Advertising::inRandomOrder()->limit(1)->first(),
        ]);
    }
}
