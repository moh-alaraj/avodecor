<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function privacy(){
        return view('website.privacy');
    }

    public function tearms(){
        return view('website.tearms');
    }
}
