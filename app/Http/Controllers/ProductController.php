<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductReview;
use App\Models\ProductSlider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function productIndex()
    {
        return view('Admin.pages.product');
    }

    public function ProductList(Request $request)
    {
        $user_id= Auth::user()->id;
        return Product::where('user_id',$user_id)->orderBy('id','desc')->get();
    }

    // Add Method for create products
    function createProduct(Request $request)
    {
        $user_id= Auth::id();

        $img=$request->file('image');
        $t=time();
        $file_name= $img->getClientOriginalExtension();
        $img_name="{$user_id}-{$t}_{$file_name}";
        $img_url="uploads/product/{$img_name}";

        $img->move(public_path('uploads/product/'), $img_name);

        $ProductPrice=$request->input('price');
        $ProductDiscount=$request->input('discount');
        $discountPrice= $ProductPrice-$ProductDiscount;

        return Product::create([
            'title'=>$request->input('title'),
            'short_des'=>$request->input('short_des'),
            'price'=>$request->input('price'),
            'discount'=>$request->input('discount'),
            'discount_price'=> $discountPrice,
            "image"=>$img_url,
            'stock'=>$request->input('stock'),
            'star'=>$request->input('star'),
            'user_id'=>$user_id,
            'category_id'=>$request->input('category_id'),
            'brand_id'=>$request->input('brand_id'),
        ]);

    }




    public function ListProductCategory(Request $request):JsonResponse
    {
        $data=Product::where('category_id', $request->id)->with('brand', 'category')->get();
        return ResponseHelper::Out('success', $data, 200);
    }
    public function ListProductBrand(Request $request):JsonResponse
    {
        $data=Product::where('brand_id', $request->id)->with('brand', 'category')->get();
        return ResponseHelper::Out('success', $data, 200);
    }
    public function listProductByRemark(Request $request):JsonResponse
    {
        $data=Product::where('remarks', $request->remarks)->with('brand', 'category')->get();
        return ResponseHelper::Out('success', $data, 200);
    }
    public function ListProductSlider(Request $request):JsonResponse
    {
        $data=ProductSlider::all();
        return ResponseHelper::Out('success', $data, 200);
    }
    public function ProductDetailById(Request $request):JsonResponse
    {
        $data=ProductDetail::where('product_id', $request->id)->with('product','product.brand','product.category')->get();
        return ResponseHelper::Out('success', $data, 200);
    }
    public function listReviewByProduct(Request $request):JsonResponse
    {
        $data=ProductReview::where('product_id', $request->product_id)->with(['product'=>function ($query) {
            $query->select('id', 'cus_name');
        }])->get();
        return ResponseHelper::Out('success', $data, 200);
    }
}






















