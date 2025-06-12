<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductReview;
use App\Models\ProductSlider;
use Exception;
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
        return Product::where('user_id',$user_id)->get();
    }

    public function productById(Request $request)
    {
        $user_id=Auth::id();
        $product_id=$request->input('id');

        return Product::where('user_id',$user_id)->where('id',$product_id)->first();
    }
    // Add Method for create products
    public function createProduct(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_des' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'required|numeric|min:0|max:100',
            'stock' => 'required|integer',
            'star' => 'required|numeric|min:1|max:5',
            'remark' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        try {
            $user_id = Auth::id();

            $img = $request->file('image');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}_{$file_name}";
            $img_url = "uploads/product/{$img_name}";

            // Save image after validation
            $img->move(public_path('uploads/product/'), $img_name);

            $price = floatval($request->input('price'));
            $discount = floatval($request->input('discount'));
            $discountPrice = round($price - ($price * ($discount / 100)), 2);

            $product = Product::create([
                'title' => $request->input('title'),
                'short_des' => $request->input('short_des'),
                'price' => $price,
                'discount' => $discount,
                'discount_price' => $discountPrice,
                'image' => $img_url,
                'stock' => $request->input('stock'),
                'star' => $request->input('star'),
                'remark' => $request->input('remark'),
                'user_id' => $user_id,
                'category_id' => $request->input('category_id'),
                'brand_id' => $request->input('brand_id'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Product created successfully',
                'data' => $product
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
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

    public function listProductByRemark(Request $request): JsonResponse
    {
        $data = Product::where('remark', $request->remark)
            ->with('brand', 'category')
            ->get();

        return ResponseHelper::Out('success', $data, 200);
    }

    public function ListProductSlider(Request $request):JsonResponse
    {
        $data=ProductSlider::all();
        return ResponseHelper::Out('success', $data, 200);
    }


    public function addSlider(Request $request): JsonResponse
    {
        // Validate product ID
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        // Fetch the product
        $product = Product::find($request->product_id);

        // Create a new slider entry using product data
        $slider = ProductSlider::create([
            'product_id' => $product->id,
            'title' => $product->title,
            'short_des' => $product->short_des,
            'price' => $product->price,
            'image' => $product->image,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $slider,
        ], 201);
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
