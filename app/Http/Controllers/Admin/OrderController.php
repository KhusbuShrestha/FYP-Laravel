<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
        $orders = Order::all();
        // return response()->json($restaurants);
        return view('allOrder.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $orders = Order::find($id);
        return view('allOrder.edit', compact('orders'));
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
        $order = Order::find($id);
        $order->user_id = Auth::user()->id;
        if ($request->o_code != $order->o_code) {
            return redirect('/allOrders')->with('message', 'Error! Order code match failure!');
        }
        // return $order->grandTotal;/
        if ($request->grandTotal != $order->grandTotal) {
            return redirect('/allOrders')->with('message', 'Error! Grand total match failure!');
        }
        $order->o_code = $request->o_code;
        $order->total = $order->total;
        $order->deliveryCharge = 100;
        $order->deliveryStatus = 'delivered';
        $order->grandTotal = $request->grandTotal;
        $order->update();


        // foreach ($request->products as $item) {
        //     $od = new OrderDescription();
        //     $od->order_id = $order->id;
        //     $od->name = $item['name'];
        //     $od->product_id = $item['product_id'];
        //     $od->quantity = $item['quantity'];
        //     $od->amount = $item['amount'];
        //     $od->save();
        // }
        return redirect('/allOrders')->with('message', 'Delivery Status Checked and changed!');
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

    public function detailOfOrder($id)
    {
        $orderDescriptions = OrderDescription::where('order_id', $id)->get();
        return view('orderDescription.index', compact('orderDescriptions'));
    }
}
