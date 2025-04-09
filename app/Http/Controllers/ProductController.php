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
use Illuminate\Support\Facades\File;

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

    public function productById(Request $request)
    {
        $user_id=Auth::id();
        $product_id=$request->input('id');

        return Product::where('user_id',$user_id)->where('id',$product_id)->first();
    }
    // Add Method for create products
    function createProduct(Request $request)
    {
        $user_id= Auth::id();

        // Prepaid file Name & Path
        $img=$request->file('image');
        // Pic-up current time
        $t=time();
        $file_name= $img->getClientOriginalName();
        $img_name="{$user_id}-{$t}_{$file_name}";
        $img_url="uploads/product/{$img_name}";

        $img->move(public_path('uploads/product/'), $img_name);

        $ProductPrice=$request->input('price');
        $ProductDiscount=$request->input('discount');

        $ProductPrice = floatval($ProductPrice);
        $ProductDiscount = floatval($ProductDiscount);

        $discountPrice= $ProductPrice-($ProductPrice*($ProductDiscount/100));
        $discountPrice = round($discountPrice, 2);


        return Product::create([
            'title'=>$request->input('title'),
            'short_des'=>$request->input('short_des'),
            'price'=>$request->input('price'),
            'discount'=>$request->input('discount'),
            'discount_price'=> $discountPrice,
            "image"=>$img_url,
            'stock'=>$request->input('stock'),
            'star'=>$request->input('star'),
            'remark'=>$request->input('remark'),
            'user_id'=>$user_id,
            'category_id'=>$request->input('category_id'),
            'brand_id'=>$request->input('brand_id'),
        ]);

    }

    function updateProduct(Request $request)
    {
        $user_id= Auth::id();
        $product_id=$request->input('id');
        $product= Product::where('user_id',$user_id)->where('id',$product_id)->first();

        if ($request->hasFile('image')) {
            // Upload New File
            $img=$request->file('image');
            $t=time();
            $file_name= $img->getClientOriginalName();
            $img_name="{$user_id}-{$t}_{$file_name}";
            $img_url="uploads/product/{$img_name}";

            $img->move(public_path('uploads/product/'), $img_name);

            $ProductPrice=$request->input('price');
            $ProductDiscount=$request->input('discount');

            $ProductPrice = floatval($ProductPrice);
            $ProductDiscount = floatval($ProductDiscount);

            $discountPrice= $ProductPrice-($ProductPrice*($ProductDiscount/100));
            $discountPrice = round($discountPrice, 2);


            // Delete old image
            if ($product && $product->image){
                $filePath = public_path($product->image);
                if (File::exists($filePath)){
                    File::delete($filePath);
                }
            }

            return Product::where('id',$product_id)->where('user_id',$user_id)->update([
                'title'=>$request->input('title'),
                'short_des'=>$request->input('short_des'),
                'price'=>$request->input('price'),
                'discount'=>$request->input('discount'),
                'discount_price'=> $discountPrice,
                "image"=>$img_url,
                'stock'=>$request->input('stock'),
                'star'=>$request->input('star'),
                'remark'=>$request->input('remark'),
                'user_id'=>$user_id,
                'category_id'=>$request->input('category_id'),
                'brand_id'=>$request->input('brand_id'),
            ]);
        }
        else {

            $ProductPrice=$request->input('price');
            $ProductDiscount=$request->input('discount');

            $ProductPrice = floatval($ProductPrice);
            $ProductDiscount = floatval($ProductDiscount);

            $discountPrice= $ProductPrice-($ProductPrice*($ProductDiscount/100));
            $discountPrice = round($discountPrice, 2);

            return Product::where('id',$product_id)->where('user_id',$user_id)->update([
                'title'=>$request->input('title'),
                'short_des'=>$request->input('short_des'),
                'price'=>$request->input('price'),
                'discount'=>$request->input('discount'),
                'discount_price'=> $discountPrice,
                'stock'=>$request->input('stock'),
                'star'=>$request->input('star'),
                'remark'=>$request->input('remark'),
                'user_id'=>$user_id,
                'category_id'=>$request->input('category_id'),
                'brand_id'=>$request->input('brand_id'),
            ]);
        }
    }


    public function deleteProduct(Request $request)
    {
        $user_id= Auth::id();
        $product_id=$request->input('id');
        $filePath = $request->input('file_path');
        File::delete($filePath);
        return Product::where('id',$product_id)->where('user_id',$user_id)->delete();
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






















