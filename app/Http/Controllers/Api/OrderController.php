<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderDescProductResource;
use App\Http\Resources\OrderDescResource;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderDescription;
use App\Models\Rating;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ResisterNotification;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = Rating::where('user_id', Auth::user()->id)->get();
        $ratedOrderDesc = $ratings->pluck('product_id');
// return $ratedOrderDesc;
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return OrderResource::collection($orders);
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
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->o_code = uniqid();
        $order->total = $request->total;
        $order->deliveryCharge = 100;
        $order->deliveryStatus = $request->deliveryStatus;
        $order->grandTotal = $request->grandTotal;
        $order->region = $request->region;
        $order->city = $request->city;
        $order->area = $request->area;
        $order->address = $request->address;
        $order->save();



        foreach ($request->products as $item) {
            $od = new OrderDescription();
            $od->order_id = $order->id;
            $od->name = $item['name'];
            $od->product_id = $item['product_id'];
            $od->quantity = $item['quantity'];
            $od->amount = $item['amount'];
            $od->save();

        }
        $name = Auth::user()->name;
        $emailuser = Auth::user();
        $args = http_build_query(array(
            'auth_token' => '1955db2f23a27d4e6226a604873c922614f72e6c94547d5035932efe8e9a4989',
            'to'    => Auth::user()->phone_number,
            'text' => "Dear  $name,\nYour order has been placed successfullly.\nRegards, Ghar Dailo"
        ));
        $url = "https://sms.aakashsms.com/sms/v3/send/";

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1); ///
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Response
        $response = curl_exec($ch);
        curl_close($ch);

        // email notification

         Notification::send($emailuser,new OrderNotification);
        return response()->json([
            'message' => 'Your Order has been Successfully'
        ], 201);
        return response()->json(['message' => 'You order has been placed']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Order::where('user_id', Auth::user()->id)->where('id', $id)->get();
        $odItem = OrderDescription::where('order_id', $id)->get();
        return response()->json(['order' => $orders, 'orderDescription' => $odItem]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

    public function userOrderDescription($id){
        $userOd = OrderDescription::where('order_id', $id)->get();
        // return response()->json($userOd);
        return OrderDescResource::collection($userOd);
    }

    public function mostlySelling()
    {
        $odItem = OrderDescription::orderBy('product', 'desc')->selectRaw('count(name) as product, product_id')->groupBy('product_id')->get();
        return response()->json($odItem);
        // return OrderDescProductResource::collection($odItem);
    }
}
