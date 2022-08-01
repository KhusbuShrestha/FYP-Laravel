<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producer;
use App\Models\Product;
use App\Models\Vedor;
use App\Models\Vendor;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('vendor.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = Vendor::all();
        $products = Product::all();
        return view('vendor.create', compact('vendors', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendor = New Vendor();
        $vendor->name = $request->name;
        $vendor->number = $request->number;
        $vendor->email = $request->email;
        $vendor->city = $request->city;
        $vendor->product_id = $request->product_id;
        $vendor->save();
        return redirect('/vendor')->with('message', 'vendor added succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendors = Vendor::find($id);
        $products = Product::all();
        return view('vendor.edit', compact('vendors', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vendor = Vendor::find($id);
        $vendor->name = $request->name;
        $vendor->number = $request->number;
        $vendor->email = $request->email;
        $vendor->city = $request->city;
        $vendor->product_id = $request->product_id;
        $vendor->update();
        return redirect('/vendor')->with('message', 'vendor updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function producer(){
        $producers = Producer::all();
        return view('producer.index', compact('producers'));

    }
}
