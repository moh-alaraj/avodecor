<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamControllers extends Controller
{
    public function index(){
        $users = Team::all();


        return view('website.team',[
            'ad' => Advertising::inRandomOrder()->limit(1)->first(),
            'users' => $users
        ]);
    }
}
