<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Brand;

class WebsiteController extends Controller{
    public function index(){
        $hot_deals = Product::where('hot_deals',1)->where('product_status',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->get();
        $featureds = Product::where('featured',1)->where('product_status',1)->orderBy('id','DESC')->get();
        $products = Product::where('product_status',1)->orderBy('id','DESC')->get();
        return view('website.home.home',compact('products','featureds','hot_deals'));
    }

    public function productDetails($id,$slug){
        $product = Product::findOrFail($id);
        $multiImgs = MultiImg::where('product_id',$id)->get();

        $color = $product->product_color;
        $product_color = explode(',',$color);

        $size = $product->product_size;
        $product_size = explode(',',$size);

        return view('website.product-details',compact('product','multiImgs','color','product_color','size','product_size'));
    }
    
}
