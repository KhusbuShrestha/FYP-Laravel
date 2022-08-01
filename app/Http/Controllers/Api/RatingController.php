<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RatingResource;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = Rating::orderBy('rating', 'desc')->selectRaw('avg(value) as rating,product_id')->groupBy('product_id')->get();
        return RatingResource::collection($ratings);
    }

    public function topRated()
    {
        $ratings = Rating::orderBy('rating', 'desc')->selectRaw('avg(value) as rating,product_id')->groupBy('product_id')->limit(5)->get();
        return RatingResource::collection($ratings);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rating = new Rating();
        $rating->value = $request->value;
        $rating->review = $request->review;
        $rating->user_id = Auth::user()->id;
        $rating->product_id = $request->product_id;
        $rating->save();
        return response()->json(['message' => 'Rating Submitted!']);
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

    public function averageRating($id)
    {
        // // $ratings =  Ratings::where('user_id', Auth::user()->id)->get();
        // // $ratings = Ratings::where('user_id', Auth::user()->id)->where('restaurant_id',$id)->sum('value')->get();

        // $sumRatings = Rating::where('product_id', $id)->sum('value');
        // // $sumUsers = Rating::where('product_id', $id)->count('');

        // $ratings = Rating::where('product_id', $id)->orderBy('rating', 'desc')->selectRaw('avg(value) as rating')->groupBy('product_id')->get();
        // // $reviews = Rating::where('produser_iduct_id', $id)->select('user_id', 'review')->get();
        // $reviews = Rating::where('product_id', $id)->select('user_id', 'review')->get();
        // // print($sumRatings);
        // // print($totalUsers);

        // // if ($sumRatings > 0) {
        // //     $averageRating = $sumRatings / $sumUsers;
        // // } elseif ($sumRatings == null) {
        // //     $averageRating = 0;
        // // }
        // // return response()->json(['averageRating' => $averageRating, 'totalUsers' => $sumUsers, 'reviews' => $reviews]);
        // // return response()->json(['averageRating' => $ratings, 'reviews' => $reviews]);

        // // if (Rating::whereNotIn('product_id', $is))
        // return $ratings;




        // $pluck = $ratings->pluck('rating');
        // return $pluck;
        // // if (!($pluck)) {
        // //     // $pluck = 0;
        // //     return "jf";
        // // } 
        // // else {
        // //     // return response()->json(['averageRating' => $ratings]);
        // //     return response()->json($pluck);

        // // }


        // $totalRatings = Rating::where('product_id', $id)->sum('value'); 
        $totalUsers = Rating::where('product_id', $id)->count('user_id');
        $reviews = Rating::where('product_id', $id)->select('user_id', 'review')->get();
        // if ($totalRatings > 0) { 
        //     $averageRating = $totalRatings / $totalUsers; 
        // } else { 
        //     $averageRating = 0; 
        // } 
        // $total = Rating::where('product_id', $id)->sum('value');
        // if ($total > 0) { 
        //     $averageRating = $total / $totalUsers; 
        // } else { 
        //     $averageRating = 0; 
        // } 
        // return response()->json(['averageRating' =>$total]);

        return response()->json(['reviews' => $reviews]);
    }
}
