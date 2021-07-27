<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JoinJob;
use App\Notifications\NewJopappCreatedNotification;
use http\Client\Curl\User;
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

        $join = JoinJob::create($data);

        $user = \App\Models\User::where('type','=','admin')->first();
        $user->notify(new NewJopappCreatedNotification($join));

        return redirect()->route('website.job')
            ->with('success','تم إرسال طلبك بنجاح');
    }
}
