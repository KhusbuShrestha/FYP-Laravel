<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressDeliveryResource;
use App\Models\AddressDelivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ad = AddressDelivery::where('user_id', Auth::user()->id)->get();
        return AddressDeliveryResource::collection($ad);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ad = new AddressDelivery();
        $ad->region = $request->region;
        $ad->city = $request->city;
        $ad->area = $request->area;
        $ad->address = $request->address;
        $ad->user_id = Auth::user()->id;
        $ad->save();
        return response()->json([
            "message" => "Delivery Address Added."
        ], 201);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
