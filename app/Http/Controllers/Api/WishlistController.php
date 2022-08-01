<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WishlistResource;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
        return WishlistResource::collection($wishlists);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // return $request;
         $wishList = new Wishlist();
         $wishList->name = $request->name;
         $wishList->sp = $request->sp;
         $wishList->user_id = Auth::user()->id;
         $wishList->product_id = $request->product_id;
         $wishList->picture = $request->picture;
         $wishList->save();
         
         return response()->json([
             "message" => "Wishlist added successfully!!"
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
        $wishlists = Wishlist::where('user_id', $id)->get();
        return WishlistResource::collection($wishlists);
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
        $wishlists = Wishlist::findOrFail($id);
        $wishlists->delete();
        return response()->json(
            [
                'message'=> 'Product removed from wishlist'
            ], 200
        );
    }
}
