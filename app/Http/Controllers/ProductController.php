<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductReview;
use App\Models\ProductSlider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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






















