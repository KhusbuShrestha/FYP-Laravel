<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function viewcategory($slug){
        if(Category::where($slug)->exists()){
            $category = Category::where('slug', $slug)->first();
            $product = Product::where('category_id', $category->id)->where('status', '0')->get();
            return view('frontend.product.index', compact('category', 'product'));
        }

    }
}
