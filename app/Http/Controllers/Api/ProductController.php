<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        // return response()->json($products);
        return ProductResource::collection($products);
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
        $products = Product::where('id',$id)->get();
        // return response()->json($products);
        return ProductResource::collection($products);
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

    public function productSearch($search)
    {
        $sortedProducts = Product::orderBy('name', 'asc')->select('name')->get();
        $productsCollection = ProductResource::collection($sortedProducts);
        $products = $productsCollection->pluck('name');
        $exactWord = Product::where('name', 'LIKE', '%' . $search . '%')->get();
        if (!empty($exactWord)) {
            # code...
            return ProductResource::collection($exactWord);
        } else {
            # code...
            $firstChar = substr($search, 0, 1);
            $similarWord = Product::where('name', 'LIKE', $firstChar . '%')->get();
            // $pluck = $similarWord->pluck('name');
            // if ($pluck->isEmpty()){
            //     return 'jk';
            // }
            return ProductResource::collection($similarWord);
        }
       
       
    }


    public function recentlyProducts()
    {
        // $products = Product::orderBy('created_at', 'desc')->paginate(2);
        // $products = Product::orderBy('created_at', 'desc')->take(2);
        $previousSeven = Carbon::now()->subDays(7);         
        $now = Carbon::now()->format('Y-m-d');
        $products = Product::whereBetween('updated_at', [$previousSeven, $now])->orderBy('updated_at', 'desc')->get();
        // $products = Product::orderBy('created_at', 'desc')->get();

        // return response()->json($products);Model::where(['zone_id'=>1])->offset($offset)->limit($limit)->get();
        return ProductResource::collection($products);
    }
    public function productInInc($id)
    {
        $unsortedProducts = Product::where('category_id', $id)->select('sp', 'id', 'name', 'description', 'picture', 'category_id', 'sku','discount','price')->get();
        $product_array = $unsortedProducts;
        do {
            $replaced = false;
            for ($i = 0, $cnt = count($product_array) - 1; $i < $cnt; $i++) {
                if ($product_array[$i] > $product_array[$i + 1]) {
                    list($product_array[$i + 1], $product_array[$i]) =
                        array($product_array[$i], $product_array[$i + 1]);
                    $replaced = true;
                }
            }
        } while ($replaced);
        // return $product_array;
        return ProductResource::collection($product_array);
    }
    public function productInDec($id)
    {
        $unsortedProducts = Product::where('category_id', $id)->select('sp', 'id', 'name', 'description', 'picture', 'category_id', 'sku','discount','price')->get();
        $product_array = $unsortedProducts;
        do {
            $replaced = false;
            for ($i = 0, $cnt = count($product_array) - 1; $i < $cnt; $i++) {
                if ($product_array[$i] < $product_array[$i + 1]) {
                    list($product_array[$i + 1], $product_array[$i]) =
                        array($product_array[$i], $product_array[$i + 1]);
                    $replaced = true;
                }
            }
        } while ($replaced);
        // return $product_array;
        return ProductResource::collection($product_array);
    }

}
