<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cartItems = Cart::where('user_id',$id)->get();
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();
        return CartResource::collection($cartItems);
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
        $cartItem = new Cart();
        $cartItem->name = $request->name;
        $cartItem->sp = $request->sp;
        $cartItem->quantity = $request->quantity;
        $cartItem->cartTotal = ($request->quantity * $request->sp);
        $cartItem->user_id = Auth::user()->id;
        // $cartItem->user_id = $request->user_id;
        $cartItem->product_id = $request->product_id;
        $cartItem->picture = $request->picture;
        // if($request->hasFile('picture')){
        //     $fileName = $request->picture;
        //     $newName = time().$fileName->getClientOriginalName();
        //     // $image_resize = Image::make($image->getRealPath());
        //     //     $image_resize->resize(600,600,
        //     //         function($constraint){
        //     //             $constraint->aspectRatio();
        //     //             $constraint->upsize();
        //     //         }
        //     //     );
        //     $fileName->move('productImage', $newName);
        //     $cartItem->picture = 'productImage/'.$newName;
        // }
        $cartItem->save();
        
        // return redirect('/product')->with('message', 'product added succesfully');
        return response()->json([
            "message" => "Item added to cart"
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
        $cartItems = Cart::where('user_id',$id)->get();
        // $cartItems = Cart::all();
        return CartResource::collection($cartItems);
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
        $cartItems = Cart::findOrFail($id);
        // $cartItems = Cart::where('id', $id)->get();
        $cartItems->delete();
        return response()->json([
            'message' => 'Item deleted'],200);
    }

    public function cartTotal(){
        $total = Cart::where('user_id', Auth::user()->id)->sum('cartTotal');
        return response()->json(['total' =>$total]);
    }

    public function destroyCart()
    {
        $wholeCart = Cart::where('user_id', Auth::user()->id);
        $wholeCart->delete();
        return response()->json([
            'message' => 'All items removed from cart'],200);
    }

}
