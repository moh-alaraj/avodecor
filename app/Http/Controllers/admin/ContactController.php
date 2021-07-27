<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'

        ]);

        $data = $request->all();

        Contact::create($data);

        return redirect()->route('website.contact')
            ->with('success','شكرا لتواصلك معنا ');
    }
}
