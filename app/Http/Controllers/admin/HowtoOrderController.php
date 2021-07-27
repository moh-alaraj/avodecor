<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HowToOrder;
use Illuminate\Http\Request;

class HowtoOrderController extends Controller
{

    public function index()
    {
        $orders = HowToOrder::all();
        return view('admin.orders.index',compact('orders'));
    }


    public function create()
    {
        return view('admin.orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);
        $data =  $request->all();

        HowToOrder::create($data);
        return redirect()->route('admin.orders.index')
            ->with('success','created successfully');
    }


    public function show($id)
    {
        //
    }



    public function edit($id)
    {
        $orders = HowToOrder::findOrFail($id);
        return view('admin.orders.edit',compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $orders = HowToOrder::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);
        $data = $request->all();

        $orders->update($data);

        return redirect()->route('admin.orders.index')
            ->with('success','Updated successfullu');


    }

    public function destroy($id)
    {
        $orders = HowToOrder::findOrFail($id);
        $orders->delete();
        return redirect()->route('admin.orders.index')
            ->with('danger','deleted successfully');
    }
}
