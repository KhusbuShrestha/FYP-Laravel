<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producer;
use App\Notifications\ProducerNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $producer = new Producer();
        
        $producer->name = $request->name;
        $producer->phone_number = $request->phone_number;
        $producer->category = $request->category;
        $producer->address = $request->address;
        $producer->inquiryStatus = 'not called';
        $producer->save();

        // $name = Auth::user()->name;
        // $emailuser = Auth::user()->email;
        // return $emailuser ;
        // $args = http_build_query(array(
        //     'auth_token' => '1955db2f23a27d4e6226a604873c922614f72e6c94547d5035932efe8e9a4989',
        //     'to'    => Auth::user()->phone_number,
        //     'text' => "Dear  $name,\nYour order has been placed successfullly.\nRegards, Ghar Dailo"
        // ));
        // $url = "https://sms.aakashsms.com/sms/v3/send/";

        // # Make the call using API.
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, 1); ///
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // // Response
        // $response = curl_exec($ch);
        // curl_close($ch);

        // email notification
        // $produceremail = Producer::where('user_id', 49 )->select('email');
        // // $emailuser = 'ghardailo2@gmail.com';
        //  Notification::send($produceremail,new ProducerNotification);
        // return response()->json([
        //     'message' => 'Your Order has been Successfully'
        // ], 201);
        // return response()->json(['message' => 'You order has been placed']);
        return response()->json(['message' => 'You will get in touch with ASAP!']);
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
