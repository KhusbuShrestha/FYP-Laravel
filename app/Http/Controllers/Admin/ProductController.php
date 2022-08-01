<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
// use Intervenation\Image\Facades\Image;
// use Intervena



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
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('product.create', compact('products', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = New Product();
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount = $request->discount;
        if ($request->discount){
            $product->sp =( $request->price - (($request->discount/100)* $request->price));   
        }else{
            $product->sp = $request->price;
        }
        $product->description = $request->description;
        $product->category_id = $request->category_id;
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
        //     $product->picture = 'productImage/'.$newName;
        // }
        if ($request->hasFile('picture')) { 
            $file = $request->picture; 
            $newName  = time() . $file->getClientOriginalName(); 
            $file->move('product-image', $newName); 
            $product->picture = "product-image/$newName"; 
        }
        // if($request->hasFile('picture')){
        //     if($product->image){
        //         @unlink($product->image);
        //     }
        //     $fileName = $request->image;
        //     $newName = time().'.'.$fileName->getClientOriginalExtension();
        //     $image_resize = Image::Make($fileName->getRealPath());
        //     $image_resize->resize(200, 200,
        //         function($constraint){
        //             $constraint->aspectRatio();
        //             $constraint->upsize();
        //         }
        //     );
        //     $image_resize->save(public_path('images/food/'.$newName));
        //     $product->image = 'images/food/' .$newName;
        //     }

        $product->save();
        return redirect('/product')->with('message', 'product added succesfully');
         
        
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
        $products = Product::Find($id);
        $categories = Category::all();
        return view('product.edit', compact('products', 'categories'));
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
        $product = Product::find($id);
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->sp = $request->sp;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
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
        //     $product->picture = 'productImage/'.$newName;
        if ($request->hasFile('picture')) { 
            $file = $request->picture; 
            $newName  = time() . $file->getClientOriginalName(); 
            $file->move('product-image', $newName); 
            $product->picture = "product-image/$newName"; 
        }
        
        $product->update();
        return redirect('/product')->with('message', 'product updted succesfully');
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
