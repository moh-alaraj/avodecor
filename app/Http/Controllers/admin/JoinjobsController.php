<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JoinJob;
use Illuminate\Http\Request;

class JoinjobsController extends Controller
{
    public function store(Request $request){

        $request->validate([
           'name' => 'required|string',
           'email' => 'required',

        ]);

        $data = $request->all();

        $filename = $request->cv->move(public_path('images'),str_replace(' ','',$request->cv->getClientOriginalName()));
        $data['cv'] = $filename->getBasename();

        JoinJob::create($data);

        return redirect()->route('website.job')
            ->with('success','تم إرسال طلبك بنجاح');
    }
}
